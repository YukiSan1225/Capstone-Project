## Custom configuration for SSL certificate & setup
FROM yukisan1225/erpg_backend:1.6.1
RUN apt-get update && \
    apt-get install -y \
        zlib1g-dev
COPY server.crt /etc/apache2/ssl/server.crt
COPY server.key /etc/apache2/ssl/server.key
COPY ERPG.conf /etc/apache2/sites-enabled/dev.conf
RUN a2enmod rewrite
RUN a2enmod ssl
RUN service apache2 restart