#!/bin/bash
set -e

# Construire l'image Docker pour l'application React
cd /vagrant/my-react-app  # Assurez-vous que le code source de l'app est ici
docker build -t react-app:latest .

# Créer le fichier deployment.yaml
cat <<EOF > /vagrant/deployment.yaml
apiVersion: apps/v1
kind: Deployment
metadata:
  name: react-app
spec:
  replicas: 2
  selector:
    matchLabels:
      app: react-app
  template:
    metadata:
      labels:
        app: react-app
    spec:
      containers:
        - name: react-app
          image: react-app:latest
          ports:
            - containerPort: 80
EOF

# Créer le fichier service.yaml
cat <<EOF > /vagrant/service.yaml
apiVersion: v1
kind: Service
metadata:
  name: react-app
spec:
  type: NodePort
  selector:
    app: react-app
  ports:
    - port: 80
      targetPort: 80
      nodePort: 31000
EOF

# Déployer sur Kubernetes
kubectl apply -f /vagrant/deployment.yaml
kubectl apply -f /vagrant/service.yaml
