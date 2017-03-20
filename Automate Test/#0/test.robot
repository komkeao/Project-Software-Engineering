*** Settings ***
Library    Selenium2Library

*** Variables ***
#CONFIG
${BROWSER}    Chrome
${DELAY}    0
${URL WELCOME}    http://localhost/SoftEn2/
${URL FORGET}    http://localhost/SoftEn2/index.php/home/forget_password
${URL RESET}    http://localhost/SoftEn2/index.php/home/reset_password
${URL LOGIN SUCCESS}    http://localhost/SoftEn2/index.php/home/donation
${URL PROFILE}    http://localhost/SoftEn2/index.php/user/profile

#INPUT VARIABLES
${INPUT EMAIL}    email
${INPUT PASSWORD}    password
${INPUT ANSWER}    answer
${INPUT CONFIRM PASSWORD}    confirm_password
${SELECT QUESTION}    question

#VALID MSG
${VALID WELCOME PAGE}    News
${VALID LOGIN MODAL}    เข้าสู่ระบบ
${VALID FORGET PAGE CONTAINS}    ลืมรหัสผ่าน

#BUTTON
${LOGIN BUTTON}    loginModal
${FORGET LINK}    forgetLink



*** Test Cases ***
Open Browser And Initial Config:
    Open Browser    ${URL WELCOME}    ${BROWSER}
    Wait Until Page Contains    ${VALID WELCOME PAGE}
    Set Selenium Speed    ${DELAY}

Go To Login Modal
    Click Button    ${LOGIN BUTTON}
    Wait Until Page Contains    ${VALID LOGIN MODAL}
    Set Selenium Speed    ${DELAY}

Go To Forget Page
    Click Link    ${URL FORGET}
    Wait Until Page Contains    ${VALID FORGET PAGE CONTAINS}
    Location Should Be    ${URL FORGET}
