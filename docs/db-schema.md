# Database Schema – Blog System

## Goals
Store and manage blog posts with categories, tags, and author relationships.

## Tables and Columns (Minimum Required)
### blogs
- id (PK, bigint)
- title (varchar 255, not null)
- slug (varchar 255, unique, indexed)
- excerpt (text, nullable)
- content (longtext)
- status (enum: draft|published|archived)
- published_at (datetime, nullable)
- author_id (FK -> users.id)
- created_at, updated_at, deleted_at?

### categories
- id (PK)
- name (varchar 120, unique)
- slug (varchar 120, unique, indexed)
- description (text, nullable)
- created_at, updated_at

### tags
- id (PK)
- name (varchar 120, unique)
- slug (varchar 120, unique, indexed)
- created_at, updated_at

### blogs_categories (Pivot)
- blog_id (FK -> blogs.id, on delete cascade, indexed)
- category_id (FK -> categories.id, on delete cascade, indexed)
- PRIMARY KEY (blog_id, category_id)

### blogs_tags (Pivot)
- blog_id (FK -> blogs.id, on delete cascade, indexed)
- tag_id (FK -> tags.id, on delete cascade, indexed)
- PRIMARY KEY (blog_id, tag_id)

### blogs_users (Pivot)
- blog_id (FK -> blogs.id, on delete cascade, indexed)
- user_id (FK -> users.id, on delete cascade, indexed)
- role (enum: owner|coauthor|editor)
- PRIMARY KEY (blog_id, user_id)

## Relationships (Laravel)
- Blog:
  - belongsTo User (author) *(optional)*
  - belongsToMany Category through blogs_categories
  - belongsToMany Tag through blogs_tags
  - belongsToMany User (coauthors) through blogs_users *(optional)*
- Category: belongsToMany Blog
- Tag: belongsToMany Blog

## ERD (Mermaid)
```mermaid
---
title: ERD
---
erDiagram
    User }o--o{ Blog : authors
    Blog }o..o{ Category : categories
    Blog }o..o{ Tag : tags
    User {
        bigint id PK
        varchar name
        varchar email
        timestamp email_verified_at
        varchar password
        varchar remember_token
        timestamp created_at
        timestamp updated_at
    }
    Blog {
        bigint id PK
        varchar title
        varchar slug
        varchar excerpt
        varchar content
        bigint likes
        enum status
        varchar cover
        bigint views
        json meta_data
        timestamp created_at
        timestamp updated_at
    }
    Category {
        bigint id PK
        varchar(255) name
    }
    Tag {
        bigint id PK
        varchar(255) name
    }
```
