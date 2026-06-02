# aws-ecommerce-project
A cloud-powered e-commerce store built on AWS (EC2, RDS, S3, CloudFront, IAM, CloudWatch)


# AWS E-Commerce Store

A fully cloud-powered e-commerce website built on AWS from scratch as a learning project.

## Live Demo
https://d39z23unkmbm3i.cloudfront.net

## Architecture Overview
User → CloudFront (CDN + HTTPS) → EC2 (Web Server) → RDS (Database)
                                         ↓
                                    S3 (Images)

## AWS Services Used

| Service | Purpose |
|---|---|
| EC2 | Virtual server running Apache + PHP |
| RDS (MySQL) | Managed database storing products |
| S3 | Object storage for product images |
| CloudFront | Global CDN with HTTPS/SSL |
| IAM | Least-privilege user roles and permissions |
| CloudWatch | CPU monitoring and email alerts |

## What I Built
- A live product listing page pulling data dynamically from a cloud database
- Product images served from S3 object storage
- Site distributed globally via CloudFront CDN with HTTPS
- IAM user with read-only permissions demonstrating least privilege principle
- CloudWatch alarm triggering email alerts on high CPU usage

## Security Practices Applied
- IAM user with minimal permissions (no root account usage)
- Database credentials stored as environment variables, not hardcoded
- HTTPS enforced via CloudFront — HTTP redirects automatically
- Security groups configured to control inbound traffic

## What I Learned
- Launching and SSH-ing into a cloud server
- Connecting a web app to a managed relational database
- Storing and serving static assets from object storage
- Distributing a site globally with a CDN and SSL certificate
- Debugging real cloud errors (504 timeouts, security group misconfigs)
- Implementing IAM roles and least privilege access
- Setting up infrastructure monitoring and alerting

## Tech Stack
PHP · MySQL · Apache · AWS

## Status
Live and deployed via CI/CD pipeline 🚀

apa citaq
