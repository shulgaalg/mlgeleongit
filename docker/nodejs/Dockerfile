FROM node:16.16.0
# Create app directory
RUN mkdir -p /usr/app

WORKDIR /usr/app
# Install app dependencies
COPY package*.json /usr/app/

RUN npm install
# Bundle app source
COPY . .
  
EXPOSE 8080

CMD [ "npm", "start" ]