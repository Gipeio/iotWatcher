#!/bin/bash
set -e

# Appliquer les mises à jour et installer les dépendances
apt-get update -y
apt-get install -y curl apt-transport-https

# Ajouter la clé GPG de Kubernetes
curl -s https://packages.cloud.google.com/apt/doc/apt-key.gpg | apt-key add -

# Ajouter le repository de Kubernetes
cat <<EOF >/etc/apt/sources.list.d/kubernetes.list
deb https://apt.kubernetes.io/ kubernetes-xenial main
EOF

apt-get update -y

# Installer kubelet, kubeadm et kubectl
apt-get install -y kubelet kubeadm kubectl
apt-mark hold kubelet kubeadm kubectl

# Désactiver le swap
swapoff -a
sed -i '/ swap / s/^/#/' /etc/fstab

# Initialiser le cluster
kubeadm init --apiserver-advertise-address=${CONTROL_IP} --pod-network-cidr=${POD_CIDR}

# Configurer kubectl pour l'utilisateur vagrant
mkdir -p $HOME/.kube
cp -i /etc/kubernetes/admin.conf $HOME/.kube/config
chown $(id -u):$(id -g) $HOME/.kube/config

# Appliquer le réseau Calico
kubectl apply -f https://docs.projectcalico.org/manifests/calico.yaml
