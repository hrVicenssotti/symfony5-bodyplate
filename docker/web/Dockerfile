FROM nginx:latest

COPY default.conf /etc/nginx/conf.d/
COPY upstream.conf /etc/nginx/conf.d/upstream.conf

RUN usermod -u 1000 www-data
