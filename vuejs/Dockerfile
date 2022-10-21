FROM node:lts-alpine

RUN mkdir /app
WORKDIR /app

ENV PATH /app/node_modules/.bin:$PATH

COPY package.json /app

RUN npm install
RUN npm install -g @vue/cli
RUN npm install --save-dev cross-env

CMD ["npm", "run", "dev"]