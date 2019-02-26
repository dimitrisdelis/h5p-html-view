# h5p-html-view
making h5p view in plain html by simplifying the whole integration process

The purpose of this is to make a "simple" h5p integration with a plain html
Following the platform integration development guide (and trying to understand how already existing plugins like wordpress, drupal, moodle work)

->Starting with index.php : simple upload form
->Going to upload.php -> file is checked(if it has .h5p extension) and unziped to tmp folder
->Going through some validation files in order to check whether all the necessairy files are present
->updating/installing libraries that are needed (not finished)
->storing libraries into libraries directory and content into content directory and deleting the tmp folder
->not finished : trying to integrade

PS: config.php is useless right now, it exists in case there needs to be a database(it'll be made using wamp)
