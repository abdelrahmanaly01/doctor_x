#!/usr/bin/env python
# coding: utf-8

# In[1]:


import base64
import numpy as np
import io
import matplotlib.pyplot as plt

import tensorflow as tf
from tensorflow import keras



from keras.applications.densenet import DenseNet121
from keras.layers import Dense, GlobalAveragePooling2D
from keras.models import Model
from tensorflow.keras.preprocessing import image

from PIL import Image

from flask import request
from flask import jsonify
from flask import Flask
from flask_cors import CORS, cross_origin

# In[2]:


app = Flask(__name__)

cors = CORS(app)
app.config['CORS_HEADERS'] = 'Content-Type'

# In[3]:


labels = ['Cardiomegaly', 
      'Emphysema', 
      'Effusion', 
      'Hernia', 
      'Infiltration', 
      'Mass', 
      'Nodule', 
      'Atelectasis',
      'Pneumothorax',
      'Pleural_Thickening', 
      'Pneumonia', 
      'Fibrosis', 
      'Edema', 
      'Consolidation']

# In[4]:


def get_model():
    global model
    # create the base pre-trained model
    base_model = DenseNet121(weights='models/densenet.hdf5', include_top=False)

    x = base_model.output

    # add a global spatial average pooling layer
    x = GlobalAveragePooling2D()(x)

    # and a logistic layer
    predictions = Dense(len(labels), activation="sigmoid")(x)

    model = Model(inputs=base_model.input, outputs=predictions)
    model.load_weights("models/pretrained_model.h5")
    print(" * Model loaded!")
get_model()


# In[5]:



def load_image(img, preprocess=True, H=320, W=320):
    """Load and preprocess image."""
    if img.mode != "RGB":
         img = img.convert("RGB")
    x = img.resize((H,W))
    if preprocess:
        x = np.array(x)
        mean = x.mean()
        std = x.std()
        x = x-mean
        x = x/std
        x = np.expand_dims(x, axis=0)
    
    return x    


# In[6]:


@app.route("/predict", methods=["POST"])
@cross_origin()
def predict():
    labels = ['Cardiomegaly', 
          'Emphysema', 
          'Effusion', 
          'Hernia', 
          'Infiltration', 
          'Mass', 
          'Nodule', 
          'Atelectasis',
          'Pneumothorax',
          'Pleural_Thickening', 
          'Pneumonia', 
          'Fibrosis', 
          'Edema', 
          'Consolidation']

    #getting image from api
    message = request.get_json(force=True)
    #change the image from base64 format to image format
    encoded = message['image']
    decoded = base64.b64decode(encoded)
    image = Image.open(io.BytesIO(decoded))
    
    processed_image = load_image(image)

    prediction = model.predict(processed_image)
    lbl = labels
    preds = {}
    for value in prediction[0]:
        for key in lbl:
            preds[key] = str(round(value,2))
            lbl.remove(key)
            print(key,value)
            break
    response = preds
    print(response)
    return jsonify(response)


# In[ ]:




