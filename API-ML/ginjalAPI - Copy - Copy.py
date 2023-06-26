import cv2
import numpy as np
import torch
from torchvision.models import resnet50, ResNet50_Weights
import torchvision.transforms as transforms
import torch.nn as nn
import torch.optim as optim
from io import BytesIO
from PIL import Image
from flask import Flask, request, render_template
from flask_cors import CORS
from torchvision import transforms
from numpy import asarray
from PIL import Image

app = Flask(__name__)
CORS(app)

# Load the saved model
checkpoint_path='C:/laragon/www/lab-ginjal-app/API-ML/MLModel/newModelBismillahFinal.pt'
model= resnet50(weights=ResNet50_Weights.DEFAULT)
num_ftrs = model.fc.in_features
model.fc = nn.Linear(num_ftrs, 2)
model.load_state_dict(torch.load(checkpoint_path,map_location='cpu'),strict=False)
model.eval()

device = torch.device("cuda:0" if torch.cuda.is_available() else "cpu")

# CLAHE Pre-Process
def apply_clahe(img):
    data = asarray(img)
    gray_image = cv2.cvtColor(data, cv2.COLOR_BGR2GRAY)
    clahe = cv2.createCLAHE(clipLimit=8.0)
    enhanced_image = clahe.apply(gray_image)
    colorimg = cv2.cvtColor(enhanced_image, cv2.COLOR_GRAY2BGR)
    image2 = Image.fromarray(colorimg)
    return image2

# Route for the main page
@app.route('/')
def index():
    return render_template('index.html')

# Route for uploading an image
@app.route('/predict', methods=['POST'])
def predict2():
    transform = transforms.Compose([
        transforms.Resize((224, 224)),
        transforms.Lambda(apply_clahe),
        transforms.ToTensor(),
        transforms.Normalize([0.485, 0.456, 0.406], [0.229, 0.224, 0.225])
    ])

    image = Image.open(BytesIO(request.files['image'].read()))
    image = transform(image).unsqueeze(0)
    output = model(image)
    prediction = output.argmax().item()

    print(output)

    return str(prediction)

if __name__ == '__main__':
    app.run(port=5000, debug=True)
