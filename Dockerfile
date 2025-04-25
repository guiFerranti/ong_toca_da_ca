FROM webdevops/php-apache-dev:8.2-alpine

RUN apk add --no-cache \
    nodejs \
    npm \
    build-base \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    sqlite-dev

COPY . /app

WORKDIR /app

RUN npm install

ENV WEB_DOCUMENT_ROOT /app/public

EXPOSE 80

CMD ["tail", "-f", "/dev/null"]
