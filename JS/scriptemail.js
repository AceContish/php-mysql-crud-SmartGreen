//code for email popup
const emailPop = () => {
  var email = '2021619682@student.uitm.edu.my';

  var subject = prompt('Subject Your Problem:');
  if (!subject) {
    return; 
  }

  var body = prompt('Description of Problem and Contact Number:');
  if (!body) {
    return;
  }

  var mailtoLink = 'mailto:' + email + '?subject=' + encodeURIComponent(subject) + '&body=' + encodeURIComponent(body);

  window.location.href = mailtoLink;
};