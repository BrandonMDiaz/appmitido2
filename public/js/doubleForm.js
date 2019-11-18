function disableButton(button) {
     button.disabled = true;
     button.value = "submitting...."
     button.form.submit();
}
