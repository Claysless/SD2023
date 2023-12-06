#!/usr/bin/bash

 kubectl apply -f /home/claysless/Documents/dev/SD2023/app-deployment.yaml

 kubectl apply -f /home/claysless/Documents/dev/SD2023/mysqldb-service.yaml

 kubectl apply -f /home/claysless/Documents/dev/SD2023/mysqldb-deployment.yaml

 kubectl apply -f /home/claysless/Documents/dev/SD2023/mysqldb-claim0-persistentvolumeclaim.yaml

 kubectl apply -f /home/claysless/Documents/dev/SD2023/app--env-configmap.yaml

 kubectl apply -f /home/claysless/Documents/dev/SD2023/app-service.yaml

