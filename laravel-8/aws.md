# AWS

## AWS Console

- Create S3 Bucket
- IAM
  - Add User
  - Permissions: Add permission `AmazonS3FullAccess`
  - Security credentials: Create access key

## Composer Installation

```sh
composer require --with-all-dependencies league/flysystem-aws-s3-v3 "^1.0"
```

## S3 .env Configuration

`.env`

```
FILESYSTEM_DISK=s3

AWS_ACCESS_KEY_ID=...
AWS_SECRET_ACCESS_KEY=...
AWS_DEFAULT_REGION=ap-southeast-1
AWS_BUCKET=...
```

```php
use Illuminate\Support\Facades\Storage;

Storage::put('hello.txt', 'Hello World');

$content = Storage::get('hello.txt');

Storage::delete('hello.txt');
```
