#!/usr/bin/bash

 kubectl delete -f /home/claysless/Documents/dev/SD2023/app-deployment.yaml

 kubectl delete -f /home/claysless/Documents/dev/SD2023/mysqldb-service.yaml

 kubectl delete -f /home/claysless/Documents/dev/SD2023/mysqldb-deployment.yaml

 kubectl delete -f /home/claysless/Documents/dev/SD2023/mysqldb-claim0-persistentvolumeclaim.yaml

 kubectl delete -f /home/claysless/Documents/dev/SD2023/app--env-configmap.yaml

 kubectl delete -f /home/claysless/Documents/dev/SD2023/app-service.yaml
