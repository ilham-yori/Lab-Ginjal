import cv2
import numpy as np
import torch
import torchvision
import torchvision.transforms as transforms
import torch.nn as nn
import torch.optim as optim
from io import BytesIO
from PIL import Image
from flask import Flask, request, render_template
from torchvision import transforms

app = Flask(__name__)

# Load the saved model
checkpoint_path='C:/laragon/www/lab-ginjal-app/API-ML/MLModel/model.pt'
model= torchvision.models.resnet18(pretrained=True)
num_ftrs = model.fc.in_features
model.fc = nn.Linear(num_ftrs, 2)
model.load_state_dict(torch.load(checkpoint_path,map_location='cpu'),strict=False)
model.eval()


def preprocess_image(image):
    transform = transforms.Compose([
        transforms.Resize(224),
        transforms.ToTensor(),
        transforms.Normalize([0.485, 0.456, 0.406], [0.229, 0.224, 0.225])
    ])
    image = transform(image).unsqueeze(0)
    return image

# Define a function for making predictions with the model
def predict(image):
    # Apply preprocessing to the image
    #image = preprocess_image(image)

    # Make a prediction with the model
    image = image.unsqueeze(0)
    print("Predict")
    with torch.no_grad():
        output = model(image)
        _, prediction = torch.max(output, 1)
    return prediction.item()

# Route for the main page
@app.route('/')
def index():
    return render_template('index.html')

# Route for uploading an image
@app.route('/predict', methods=['POST'])
def predict2():
    transform = transforms.Compose([
        transforms.Resize(224),
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
