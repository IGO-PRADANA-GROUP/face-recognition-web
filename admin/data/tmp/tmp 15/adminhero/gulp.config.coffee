notify = require 'gulp-notify'

dev = 'dev/'
dest = 'public/'

config =
  dev: dev
  dest: dest
  markups:
    src: ["#{dev}*.pug", "#{dev}*/*.pug"]
    dest: dest
  styles:
    src: ["#{dev}**/*.sass"]
    dest: dest
  scripts:
    src: ["#{dev}**/*.coffee"]
    dest: dest
    watch: ["#{dev}assets/**/*.coffee"]
  buildjs:
    src: ['./public/assets/bootstrap/js/bootstrap.min.js',
      './public/assets/scripts/plugins/js.cookie.js',
      './public/assets/scripts/plugins/moment.min.js',
      './public/assets/scripts/plugins/fastclick.js',
      './public/assets/scripts/plugins/masonry.pkgd.min.js',
      './public/assets/scripts/plugins/jquery.peity.min.js',
      './public/assets/scripts/plugins/imagesloaded.pkgd.js',
      './public/assets/scripts/plugins/jquery.matchHeight.js',
      './public/assets/scripts/plugins/select2.full.min.js',
      './public/assets/scripts/plugins/jquery.multi-select.js',
      './public/assets/scripts/plugins/bootstrap-tagsinput.js',
      './public/assets/scripts/plugins/bootstrap-maxlength.min.js',
      './public/assets/scripts/plugins/Chart.min.js',
      './public/assets/scripts/plugins/Chart.config.js',
      './public/assets/scripts/plugins/jquery.bootstrap-touchspin.min.js',
      './public/assets/scripts/plugins/daterangepicker.js',
      './public/assets/scripts/plugins/jquery.timepicker.js',
      './public/assets/scripts/plugins/bootstrap-submenu.js',
      './public/assets/scripts/plugins/prism.js',
      './public/assets/scripts/plugins/bootstrap-table.min.js',
      './public/assets/scripts/plugins/jquery.gridster.js',
      './public/assets/scripts/plugins/sss.min.js',
      './public/assets/scripts/plugins/jquery.easypiechart.min.js',
      './public/assets/scripts/plugins/behave.js',
      './public/assets/scripts/plugins/summernote.min.js',
      './public/assets/scripts/plugins/markdown.js',
      './public/assets/scripts/plugins/to_markdown.js',
      './public/assets/scripts/plugins/bootstrap-markdown.js',
      './public/assets/scripts/plugins/jquery.dataTables.min.js',
      './public/assets/scripts/plugins/dataTables.bootstrap.js',
      './public/assets/scripts/plugins/spin.min.js',
      './public/assets/scripts/plugins/ladda.min.js',
      './public/assets/scripts/plugins/waypoints.min.js',
      './public/assets/scripts/plugins/jquery.counterup.min.js',
      # 1.1.1
      './public/assets/scripts/plugins/bootstrap-select.js',
      './public/assets/scripts/plugins/jquery-asColor.js',
      './public/assets/scripts/plugins/jquery-asGradient.js',
      './public/assets/scripts/plugins/jquery-asColorPicker.js',
      './public/assets/scripts/plugins/jquery-labelauty.js',
      './public/assets/scripts/plugins/bootstrap-datepicker.js',
      # 1.1.2
      './public/assets/scripts/plugins/parsley.min.js',
      # 1.2.1
      './public/assets/scripts/plugins/owl.carousel.js']
  buildcss:
    dest: dest
    src: ['./public/assets/stylesheets/ionicons.css',
      './public/assets/stylesheets/font-awesome.css',
      './public/assets/stylesheets/weather-icons.min.css',
      './public/assets/stylesheets/animate.css',
      './public/assets/stylesheets/glyphicon.css',
      './public/assets/stylesheets/plugin/owl.carousel.min.css',
      './public/assets/stylesheets/plugin/owl.theme.default.min.css',
      './public/assets/stylesheets/plugin/*.css']
  files:
    src: ["#{dev}**/*.+(jpg|jpeg|png|gif|svg|js|html|css)"]
    dest: dest

  options:
    pug:
      pretty: true
    sass:
      indentedSyntax: true
      errLogToConsole: true
      sourceComments : false
    please:
      minifier: false
      autoprefixer:
        browsers: ['last 4 version', 'ie 8', 'iOS 4', 'Android 2.3']
    coffee:
      bare: true
    webpack:
      output:
        sourceMapFilename: 'sourcemap'
      resolve:
        extensions: ['', '.js', '.coffee']
      devtool: 'source-map'
    plumber:
      errorHandler: notify.onError "Error: <%= error.message %>"
    browserSync:
      server:
        baseDir: dest
      notify: false

module.exports = config
