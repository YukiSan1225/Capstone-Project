# E-RPG Encoder

This project was created by a group of students from the Texas Southern University's Department of Computer Science. 

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them:
```
Docker (Latest Version)
Docker Compose
```
### Installing

If you have not installed Docker, please refer to this link https://docs.docker.com/install/ for the installation of Docker. 

### Executing The Project

This is a step by step series that will help you deploy ERPG in your environment. 
Step 1: Pull the image from the docker registry
```
docker pull yukisan1225/erpg_webapp:latest
```
Step 2: Run the web application
```
docker run -d -p 443:443 yukisan1225/erpg_webapp:latest
```
Step 3: If you are runnning Docker Toolbox with Windows, please enter the hyperlink in your web browser:
```
https://192.168.99.100
```
Otherwise, please enter the hyperlink in your web browser:
```
https://localhost
```
## Versioning

We use [Docker Hub](https://hub.docker.com/r/yukisan1225/erpg_webapp/) for versioning. For the versions available, see the [tags on this repository](https://hub.docker.com/yukisan1225) and click on my repository for images. 

## Authors

* **Damien Burks** - *Security System Engineer* - [YukiSan1225](https://github.com/YukiSan1225)
* **Zaynab Okuns** - *Student* - [Zaynabidia](https://github.com/zaynabidia)
* **Macklin Thomas** - *Student* - [MacklinThomas](https://github.com/MacklinThomas)
* **Xavier Winters** - *Student* - [XWinters](https://github.com/xwinters)
* **Shawn G.** - *Student* - [SGoffney](https://github.com/sgoffney)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## Acknowledgments

* Thank you Dr. Khan for giving us the tools and the guidance that we needed to complete this project completely. Special thanks to everyone on the team for giving it their all! 

Copyright © 2018, [ERPG](https://github.com/yukisan1225/Capstone-Project)
