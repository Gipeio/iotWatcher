# IoT Watcher

Welcome to IoT Watcher, a project designed to monitor and manage IoT devices efficiently. Whether you're a developer or an end-user, IoT Watcher aims to provide an intuitive and powerful platform for your IoT needs.

## Overview

IoT Watcher is a comprehensive solution for monitoring and managing Internet of Things (IoT) devices. It includes both a backend server for handling device communication and a frontend interface for user interactions. (This repository actually only includes the back-end of the application)

## Features

- **Device Monitoring:** Real-time monitoring of connected IoT devices.
- **Data Collection:** Collect and store data from various sensors.
- **Alerts and Notifications:** Set up alerts for specific conditions and receive notifications.
- **User Management:** Manage user accounts and permissions.
- **Dashboard:** Visualize data through an intuitive dashboard.

## Getting Started

To start using IoT Watcher, follow these steps:

### Prerequisites

- Python 3.x
- Node.js (for the frontend)
- Docker (optional, for containerized deployment)

### Installation

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/Gipeio/iotWatcher.git
   cd iotWatcher
   ```

2. Backend Setup:

Navigate to the backend directory and install the required packages:

```bash
cd iotWatcher_back
pip install -r requirements.txt
```

3. Frontend Setup: (not yet implemented)

Navigate to the frontend directory and install the required packages:

```bash
cd ../iotWatcher_front
npm install
```

4. Environment Variables:

Create a .env file in the iotWatcher_back directory and add your environment variables:

```bash
touch .env
```
Example content for .env:

```env
DATABASE_URL=your_database_url
SECRET_KEY=your_secret_key
```

5. Run the Backend Server:

```bash
python app.py
```

6. Run the Frontend Server: (not yet implemented)

```bash
npm start
```
## Usage

1. Access the Dashboard:

Open your web browser and navigate to http://localhost:3000 to access the IoT Watcher dashboard.

2. Add Devices:

Use the dashboard to add and configure your IoT devices.

3.Monitor Devices:

View real-time data from your devices and set up alerts for specific conditions.

## License

IoT Watcher is licensed under the MIT License. This means you are free to use, modify, and distribute this software as long as you include the original copyright notice.

Thank you for using IoT Watcher! We hope you find it useful for your IoT projects.
