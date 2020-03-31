PTODO - Programmer's TODO

#For developers

Install Docker and Docker Compose
Guide for windows: https://www.youtube.com/watch?v=a5mxBTGfC5k

For frontend side:
1) Go to the frontend directory in terminal
   For example for me it's - ```cd /c/Users/Egor/Desktop/TODO/frontend```
2) Build and run the containers using the command - ```docker-compose up --build```
3) Visit frontend host that will be in 3000 port on your local machine address
   Usually local machine address is localhost but if you work with windows you'll know it run command ```docker-machine IP``` in your **Docker Quickstart Terminal**

For backend side:
1) Go to the backend directory in terminal
   For example for me it's - ```cd /c/Users/Egor/Desktop/TODO/backend```
2) Build and run the containers using the command - ```docker-compose up --build```
3) Visit the backend endpoint for testing called ```ping``` that will be in 8080 port on your local machine address with prefix ```/public/api/ping```
   Usually local machine address is localhost but if you work with windows you'll know it run command ```docker-machine IP``` in your **Docker Quickstart Terminal**
   For example for me full address is http://192.168.99.100:8080/public/api/ping
