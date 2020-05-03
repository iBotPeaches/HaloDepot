# Halo Depot

I'm tired of mod links dying. I'm tired of a too many sites making it difficult to find good creative mods. So this is
Halo Depot. So this website serves a point to support patch formats that have additional metadata that can produce
a screenshot and description of mod. This can be stored, indexed and made available legally.

## Supported Patches

 * Halo 2 era patches (`.serenity`)
 
## Patch Requirements

 In order for a patch format to be added to Halo Depot, it must have some additional metadata that can be used to
 extract information like - Name of mod, image of mod and author name. Those are MINIMUM requirements. Anything else 
 just is not worth it - as it requires too much additional input from the end user.
 
 The goal for Halo Depot is to be simple - Upload patch & good to go.
 
## Server Configuration

 While most of the uploads (patches) are on S3, we still need to process them with some high limits because
 patches are getting too large. (WTF 200mb patches)
 
  * `post_max_size` - Due at least 256MB
  * `upload_max_filesize` - Due 256MB as well
  * `memory_limit` - Need at least 256MB due to the processing
  
As well as due to the S3 configuration, you must set:

 * `AWS_ACCESS_KEY_ID` - Access Key from IAM
 * `AWS_SECRET_ACCESS_KEY` - Secret Key from IAM
 * `AWS_DEFAULT_REGION` - Region for S3 bucket
 * `AWS_BUCKET` - Bucket name itself.
 
Now don't be an idiot and use root creds. Make a new IAM user, gate it to only that bucket for like Put/Delete Object.
 
## Packages

 I like documenting what packages I use for legal and credit reasons.
 
 * Laravel - https://github.com/laravel/laravel - MIT
 * Binary Reader - https://github.com/mdurrant/php-binary-reader - MIT
 * Enum - https://github.com/BenSampo/laravel-enum - MIT
 * Intervention - https://github.com/Intervention/image - MIT
 * Flysystem - https://github.com/thephpleague/flysystem - MIT
 * Code Sniffer - https://github.com/squizlabs/PHP_CodeSniffer - BSD-3
 * DBAL - https://github.com/doctrine/dbal - MIT
 * SEOTools - https://github.com/artesaos/seotools - MIT
 * Laravel Deployer - https://github.com/lorisleiva/laravel-deployer - MIT
 
## License

 It is behind an MIT license because GitHub wants me to pick one. You can do anything with it inline with that license.
 If you are a Bungie or 343 or some 3rd party that produced/worked on any Halo game - you are allowed to do whatever
 you want.
