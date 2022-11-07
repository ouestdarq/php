FROM node:alpine as ssr

USER root

# Install dependencies
RUN apk update
RUN apk add --no-cache \
    git 

# Install/Update npm global dependencies
RUN npm install -g npm npm-check-updates

RUN mkdir -p /backend
WORKDIR /backend

CMD ["npm", "run", "dev"]