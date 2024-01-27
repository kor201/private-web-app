FROM nginx:latest
ENV TZ Asia/Tokyo
WORKDIR /var/www/html
RUN apt-get update && \
    apt-get install -y unzip  wget git unzip vim cron logrotate && \
    apt-get clean && rm -rf /var/lib/apt/lists/*