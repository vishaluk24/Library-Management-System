import requests
Url = "https://www.googleapis.com/books/v1/volumes?q=flowers+inauthor:keyes"
Result = requests.get(Url);
print(Result.json())