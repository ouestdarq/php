FROM node:alpine

USER root

# Install dependencies
RUN apk update
RUN apk add --no-cache \
    git 

# Install/Update npm global dependencies
RUN npm install -g npm npm-check-updates

RUN mkdir -p /var/www/html
RUN chown node:node /var/www/html

WORKDIR /var/www/html

USER node

CMD ["npm", "run", "dev"]