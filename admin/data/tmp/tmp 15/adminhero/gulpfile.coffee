gulp        = require 'gulp'
pug         = require 'gulp-pug'
sass        = require 'gulp-sass'
please      = require 'gulp-pleeease'
webpack     = require 'webpack-stream'
notify      = require 'gulp-notify'
cached      = require 'gulp-cached'
changed     = require 'gulp-changed'
plumber     = require 'gulp-plumber'
coffee      = require 'gulp-coffee'
concat      = require 'gulp-concat'
uglify      = require 'gulp-uglify'
rename      = require 'gulp-rename'
util        = require 'gulp-util'
browserSync = require 'browser-sync'

# Get gulp config
config      = require './gulp.config'
options     = config.options

# markups ########################################################################################
gulp.task 'markups', ->
  gulp.src config.markups.src
    .pipe(cached('markups'))
    .pipe(plumber options.plumber)
    .pipe(pug options.pug)
    .pipe(gulp.dest(config.markups.dest))
    .pipe(browserSync.reload({stream: true}))
# styles ########################################################################################
gulp.task 'styles', ->
  gulp.src config.styles.src
    .pipe(cached('styles'))
    .pipe(plumber options.plumber)
    .pipe(sass options.sass)
    .pipe(please options.please)
    .pipe(gulp.dest(config.styles.dest))
    .pipe(browserSync.reload({stream: true}))
# scripts #######################################################################################
gulp.task 'scripts', ->
  gulp.src config.scripts.src
    .pipe(cached('scripts'))
    .pipe(plumber options.plumber)
    .pipe(coffee options.coffee)
    .pipe(gulp.dest(config.scripts.dest))
    .pipe(browserSync.reload({stream: true}))
# files #########################################################################################
gulp.task 'files', ->
  gulp.src config.files.src
    .pipe(plumber options.plumber)
    .pipe(changed config.dest)
    .pipe(gulp.dest(config.files.dest))
    .pipe(browserSync.reload({stream: true}))
# utils #########################################################################################
gulp.task 'browserSync', ['watch'], ->
  browserSync options.browserSync

# build #########################################################################################
gulp.task 'build-js', ->
  gulp.src config.buildjs.src
    .pipe(concat('theme-plugins.js'))
    .pipe(gulp.dest('./public/assets/scripts/theme'))

gulp.task 'build-css', ->
  gulp.src config.buildcss.src
    .pipe(concat('theme-libs-plugins.css'))
    .pipe(gulp.dest('./public/assets/stylesheets'))

# tasks #########################################################################################
gulp.task 'watch', ['styles', 'scripts', 'files','markups'], ->
  gulp.watch config.markups.src, ['markups']
  gulp.watch config.styles.src, ['styles']
  gulp.watch config.scripts.watch, ['scripts']
  gulp.watch config.files.src, ['files']

gulp.task 'build', ['build-js', 'build-css']
gulp.task 'default', ['browserSync']
