$ ->
  # demo style swithcer
  # Cookies.set('colour', 'herbs', { expires: 7, path: '/' });

  # $('#mainstyle').attr 'href', 'assets/stylesheets/skin.azure.css'
  presentColor = Cookies.get('colour')

  if presentColor != undefined
    bodyClass = presentColor
    if $('body').hasClass 'layout-drawer'
      bodyClass += ' layout-drawer'
    $('body').removeClass().addClass bodyClass
    $("[data-color='" + presentColor + "']").addClass 'active'
  else
    $('body').addClass 'mirage'

  if $('.js-custom-mix-demo-pick').length
    $('.js-custom-mix-demo-pick').on 'asColorPicker::change', (e) ->
      chooseColoris = $(this).asColorPicker('val')
      $('.js-custom-mix-demo').css 'backgroundColor', chooseColoris

  $('.js-color-switcher  a').each ->
    $(this).on 'click', (e) ->
      clickColor = $(this).data 'color'
      Cookies.remove('colour', { path: '' })
      Cookies.set('colour', clickColor, { expires: 7, path: '/' });
      $('.js-color-switcher  a').removeClass 'active'
      $("[data-color='" + clickColor + "']").addClass 'active'

      if clickColor != undefined
        bodyClass = clickColor
        if $('body').hasClass 'layout-drawer'
          bodyClass += ' layout-drawer'
        $('body').removeClass().addClass bodyClass
      else
        $('body').addClass 'mirage'
