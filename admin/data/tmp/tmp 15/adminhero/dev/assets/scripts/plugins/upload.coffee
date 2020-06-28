# Admin hero v1

$upload = $("[data-plugin='upload']")

$upload.each ->
  $(this).on 'change', (e) ->
    if $(this)[0].files.length > 1
      $(this).next().text $upload.data('multiple-caption').replace '{count}',$(this)[0].files.length
    else
      $(this).next().text $(this).val().split('\\').pop()
