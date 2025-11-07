FROM amazonlinux:2023
RUN dnf -y install nginx openssl
#OS起動時に自動起動(サービス起動)
CMD ["nginx", "-g", "daemon off;"]
