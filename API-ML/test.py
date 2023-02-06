import requests

url = "http://localhost:8000/predict"
files = {'image': open('D:/DATASET/testing/Normal/n_1.jpg', 'rb')}
response = requests.post(url, files=files)
print(response.json())