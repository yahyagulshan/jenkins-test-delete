# Prerequisites 
Before you begin, make sure you have the following:

* 1- Installed Jenkins on the local system or any VM. [how to install](https://www.jenkins.io/doc/book/installing/)
     [for add credentials](https://www.jenkins.io/doc/book/using/using-credentials/#:~:text=From%20the%20Jenkins%20home%20page,Add%20Credentials%20on%20the%20left.) [for jenkins plugins](https://www.jenkins.io/doc/book/managing/plugins/)
* 2- Installed Kubernetes minikube. [how to install](https://kubernetes.io/docs/setup/)
* 3- Installed Docker.[how to install](https://docs.docker.com/engine/install/)
* 4- Make sure Jenkins has a connection with Kubernetes  [how to make connection](https://medium.com/@devayanthakur/minikube-configure-jenkins-kubernetes-plugin-25eb804d0dec)
* 5- Dockerhub repo

# Detail about files that are placed on the repository for Containerize.

* this repo we have `Dockerfile` and `index.php` file. these files are for creating php web page.
![Screenshot from 2024-01-11 21-15-00](https://github.com/yahyagulshan/jenkins-kubernetes-pipeline/assets/59036269/fb7ab2cc-ca83-40a7-8e4b-af814cfc8937)

* for creating webpage `git clone https://github.com/yahyagulshan/jenkins-kubernetes-pipeline`


# How to configure Jenkins Project

* after installing Jenkins open it on Browser.

   ---
 ![Screenshot from 2024-01-12 18-39-04](https://github.com/yahyagulshan/jenkins-kubernetes-pipeline/assets/59036269/9e68ad15-43a1-443e-bae9-407e5d03b8f7)

* click on manage jennkins

  ---
![Screenshot from 2024-01-12 18-40-31](https://github.com/yahyagulshan/jenkins-kubernetes-pipeline/assets/59036269/9da07e5e-6d19-423d-9e79-ad16ccc5f9d4)

* click on  Credentials

  ---
 ![Screenshot from 2024-01-12 18-41-53](https://github.com/yahyagulshan/jenkins-kubernetes-pipeline/assets/59036269/c97d975c-f2be-4cac-8bab-f1aa2c755308)

* then add credentials for Dockerhub and Kubernetes

* After creating the credentials create Pipeline for that click on newItem

---
 ![Screenshot from 2024-01-12 18-46-08](https://github.com/yahyagulshan/jenkins-kubernetes-pipeline/assets/59036269/ed35b900-1c74-42dc-b5ca-22e426aeb537)

* then give suitable name click on "pipeline" and press "ok"

---
 ![Screenshot from 2024-01-12 18-47-24](https://github.com/yahyagulshan/jenkins-kubernetes-pipeline/assets/59036269/1372fcae-3936-48d3-ab24-093606de9cb6)

* new page open open click on Github project and give the link of github repo ![Screenshot from 2024-01-12 18-49-45](https://github.com/yahyagulshan/jenkins-kubernetes-pipeline/assets/59036269/3a159ae1-cb14-41b9-ad2f-52e16a490059)

* In the last "Pipeline" section in `defination` select "pipeline script fo SCM". In repository again give the github repo link. for credentials select "none". in "branches to build" give your branch name and then save.
![Screenshot from 2024-01-12 18-52-08](https://github.com/yahyagulshan/jenkins-kubernetes-pipeline/assets/59036269/102837de-a251-45a7-bb37-ab510899e10d)![Screenshot from 2024-01-12 18-56-40](https://github.com/yahyagulshan/jenkins-kubernetes-pipeline/assets/59036269/f24dbd03-7f3e-4cda-8987-b56351a2fa5d)

* now press "build now"

---
![Screenshot from 2024-01-12 20-11-36](https://github.com/yahyagulshan/jenkins-kubernetes-pipeline/assets/59036269/d6780edf-9ffb-4664-9484-59f8899ab2a9)

* pipeline should be running

---
![Screenshot from 2024-01-12 20-12-54](https://github.com/yahyagulshan/jenkins-kubernetes-pipeline/assets/59036269/ce50cbd9-3af6-4144-8d93-c380941f0f8e)

 





 # Detail about Jenkinsfile

 * in this jenkinsfile first build the docker image
 * 2nd push that image to the docker hub repo
 * and 3rd this image deployed to Kubernetes minikube.

### change as per your requirement
* change in line# 16 `dockerhub-pwd` this is the Jenkins credentials we create for docker hub login
* change user name in line #17
* change in line#28 kubernates credentials `my_kubernetes` this name comes from when we establish connection when using ^^ upper articale

# Kubernetes manifest file  

* `deployment.yaml` this file create Pod and service in kubernets minikube.

## `account.yaml` file detail

* This file is used for Creating a service account with the secret for Kubernetes-plugin in minikube.
