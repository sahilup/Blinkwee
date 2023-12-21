# BlinkWee

## Overview
BlinkWee is an exciting mini social network project aimed at providing a simple yet engaging platform for users to connect and interact. Currently in its early stages of development, BlinkWee focuses on essential features such as user authentication, profile management, and email verification. The project is crafted using PHP and leverages the power of PHPMailer for secure email communications.

## Features (Under Development)

### 1. User Authentication
- **Login:** Users can securely log in to their accounts, ensuring a smooth and protected access to the BlinkWee platform.
- **Forgot Password:** In the event of a forgotten password, users can initiate a password reset process, receiving a secure link via email.

### 2. Account Management
- **Create Account:** New users can easily create accounts, providing basic information and setting up their profiles.
- **Email Verification:** Account creation involves a robust email verification process using PHPMailer, enhancing the security and authenticity of user accounts.
- **Edit Profile:** Users have the flexibility to edit their profile information, allowing for personalization and updates.

### 3. Profile Picture
- **Update Profile Picture:** BlinkWee supports the ability for users to upload and update their profile pictures, adding a visual touch to their profiles.

## Future Updates

BlinkWee is a dynamic project with exciting future updates planned to enhance user interactions and engagement. The upcoming features include:

### 1. Social Interactions
- **Post Creation:** Users will be able to share their thoughts, updates, and images with the BlinkWee community through posts.
- **Like and Comment:** A comprehensive liking and commenting system will be implemented, allowing users to express their opinions and engage with each other's content.

### 2. Messaging
- **Texting/Messaging:** Members will have the ability to send direct messages to each other, fostering private conversations within the BlinkWee platform.

### 3. Profiles and Connections
- **User Profiles:** Each user will have a detailed profile showcasing their activity, interests, and connections.
- **Follow Others:** Users can connect with each other by following, creating a network of connections and interactions.

## Contribution
BlinkWee is an open-source project, and contributions are welcome. If you are interested in shaping the future of this mini social network, feel free to fork the repository, create issues, or submit pull requests.

Let's build a vibrant community and make BlinkWee an outstanding social network experience for everyone!

# BlinkWee Database Structure

BlinkWee utilizes a straightforward database structure to store user information and manage account status. Below is the SQL schema for the BlinkWee database:

```sql
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    gender INT NOT NULL,
    email_address VARCHAR(255) UNIQUE NOT NULL,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    profile_pic VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    acc_status INT DEFAULT 0 -- 0 for Inactive, 1 for Active
);

```

## Table Explanation:

- **id:** Unique identifier for each user, auto-incremented.
- **first_name:** User's first name.
- **last_name:** User's last name.
- **gender:** Represented as an integer. You may choose to assign specific numerical values to different genders (e.g., 0 for Male, 1 for Female, 2 for Other).
- **email_address:** User's email address, unique for each user.
- **username:** User's chosen username, unique for each user.
- **password:** Hashed password for security.
- **profile_pic:** Path to the user's profile picture.
- **created_at:** Timestamp indicating when the user account was created.
- **updated_at:** Timestamp indicating the last update to the user's account.
- **acc_status:** Account status, represented as an integer. 0 could represent 'Inactive', and 1 could represent 'Active'.

This structure is designed to efficiently store user information and allow for easy expansion as new features are added to the BlinkWee social network. Adjustments and additional tables may be made in future updates to accommodate new functionalities such as posts, likes, comments, and messaging.
