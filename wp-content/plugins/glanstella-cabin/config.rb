require 'compass/import-once/activate'
# Require any additional compass plugins here.
require 'autoprefixer-rails'


# Set default encoding to UTF-8.
Encoding.default_external = 'utf-8'


# Set this to the root of your project when deployed:
http_path = "/"
css_dir = "assets/css"
sass_dir = "assets/scss"
images_dir = "images"
javascripts_dir = "assets/js"
cache_dir = ".."

# You can select your preferred output style here (can be overridden via the command line):
# output_style = :expanded or :nested or :compact or :compressed
output_style = :compact


# To enable relative paths to assets via compass helper functions. Uncomment:
# relative_assets = true


# To disable debugging comments that display the original location of your selectors. Uncomment:
line_comments = false


# If you prefer the indented syntax, you might want to regenerate this
# project again passing --syntax sass, or you can uncomment this:
# preferred_syntax = :sass
# and then run:
# sass-convert -R --from scss --to sass sass scss && rm -rf sass && mv scss sass


# Enable autoprefeixer.
on_stylesheet_saved do |file|
    css = File.read(file)
    File.open(file, 'w') do |io|
        io << AutoprefixerRails.process(css, browsers: ['last 3 versions', 'ie >= 11', 'iOS >= 7', 'android >= 4.4'])
    end
end
