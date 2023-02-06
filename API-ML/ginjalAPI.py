import io
import torch
import torchvision.transforms as transforms
from PIL import Image
from flask import Flask, request, jsonify

app = Flask(__name__)
classes = ['Batu_Ginjal', 'Normal']
model = torch.load("C:/Users/User/Downloads/3D/stage_2.kidney.pth")

# Define the image pre-processing transform
transform = transforms.Compose([
    transforms.Resize(256),
    transforms.CenterCrop(224),
    transforms.ToTensor(),
    transforms.Normalize(mean=[0.485, 0.456, 0.406], std=[0.229, 0.224, 0.225])
])

# Route for predictions
@app.route('/predict', methods=['POST'])
def predict():
    # Get the image from the request
    print("Before First")
    image_data = request.files.get('image').read()
    print("Get Image")
    pil_img = Image.open(io.BytesIO(image_data))
    print("27")
    
    # Pre-process the image
    image = transform(pil_img).unsqueeze(0)
    print("31")
    
    # Make a prediction with the model
    with torch.no_grad():
        print("Atas Output")
        output = model(image)
        print("Bawah Output")
        prediction = output.argmax().item()
        
    print("37")
        
    # Return the prediction in the response
    print("Before Return")
    return jsonify({'class': 'normal kidney' if prediction == 0 else 'kidney stone'})


@app.route("/")
def home():
    return f"Running Flask on Google Colab!"

if __name__ == '__main__':
    app.run(port=5000, debug=True)
    