FROM node:lts-alpine

# Set the working directory in the container
WORKDIR /var/www/html

# Copy package.json and package-lock.json to the working directory
COPY package*.json ./

# Install dependencies
RUN npm install --force

# Copy the rest of the application code
COPY . .

# Expose the port the application will run on
EXPOSE 3006

# Start the application
CMD [ "npm", "run", "format" ]
CMD [ "npm", "run", "dev" ]
