*** Settings ***
Library    Selenium2Library


*** Variables ***

#CONFIG
${BROWSER}    Chrome
${DELAY}    0
${CAPTCHA SLEEP TIME}    2
${URL WELCOME}    http://10.199.66.227/SoftEn2017/group11/
${URL LOGOUT}    http://10.199.66.227/SoftEn2017/group11/index.php/user/logout

#INPUT VARIABLES
${INPUT EMAIL}    email
${INPUT PASSWORD}    password
${INPUT CAPTCHA}    tag=iframe
${INPUT NAME}    dname
${INPUT DETAILS}    ddetail
${INPUT DESCRIPTION}    ddescription
${INPUT WIDTH}    dwidth
${INPUT HEIGHT}    dheight
${INPUT LENGTH}    dlength
${INPUT WEIGHT}    dweight
${INPUT IMAGE}    dfile
${INPUT AMOUNT}    damount
${INPUT TYPE}    dtype


#VALID INPUT
${VALID INPUT EMAIL}    amnat@weshare4u.com
${VALID INPUT PASSWORD}    TongHg!@1234567
${VALID INPUT NAME}    GLOWY 80% ใช้งานมาแล้วสองปี
${VALID INPUT DETAILS}    สภาพ  
${VALID INPUT DESCRIPTION}    รถเข็น GLOWY
${VALID INPUT WIDTH}    51
${VALID INPUT HEIGHT}    31
${VALID INPUT LENGTH}    108
${VALID INPUT WEIGHT}    7100
${VALID INPUT IMAGE}    D:/1.png
${VALID INPUT AMOUNT}    1599
${VALID INPUT TYPE}    2


#INVALID INPUT
${INVALID INPUT NAME}    dname
${INVALID INPUT DETAILS}    ddetail
${INVALID INPUT DESCRIPTION}    ddescription
${INVALID INPUT LENGHT}    dlength
${INVALID INPUT WIDTH}    dwidth
${INVALID INPUT HEIGHT}    dheight
${INVALID INPUT WEIGHT}    dweight
${INVALID INPUT IMAGE}    dfile
${INVALID INPUT AMOUNT}    damount
${INVALID INPUT TYPE}    dtype


#VALID  URL
${VALID URL LOGED IN}    http://10.199.66.227/SoftEn2017/group11/index.php/user/index

#VALID MSG
${VALID WELCOME PAGE MSG}    News
${VALID LOGIN MODAL MSG}    เข้าสู่ระบบ
${VALID LOGIN MSG}    สวัสดีคุณ
${VALID CHOOSE DONOR MSG}    บริจาค
${VALID CHOOSE RECIPIENT MSG}    รับบริจาค
${VALID CHOOSE RECIPIENT ICON MSG}    shopping_cart
${VALID DONATE MSG}    บริจาคสำเร็จ


#INVALID MSG
${INVALID DONATE EMPTY NAME MSG}    กรุณากรอกชื่อ


#BUTTON
${LOGIN BUTTON}    loginModal
${GO LOGIN BUTTON}    submitLogin
${CHOOSE DONOR BUTTON}    donorType
${CHOOSE RECIPIENT BUTTON}    recipientType
${DONOR SUBMIT BUTTON}    donorSubmit
*** Keywords ***
Do Login
    Delete All Cookies
    Go To    ${URL LOGOUT}
    Wait Until Page Contains    ${VALID WELCOME PAGE MSG}
    Click Button    ${LOGIN BUTTON}
    Wait Until Page Contains    ${VALID LOGIN MODAL MSG}
    Sleep    0.5
    Input Text    ${INPUT EMAIL}    ${VALID INPUT EMAIL}       
    Input Text    ${INPUT PASSWORD}    ${VALID INPUT PASSWORD}
    Click Element    ${INPUT CAPTCHA}
    Sleep    ${CAPTCHA SLEEP TIME}
    Click Button    ${GO LOGIN BUTTON}
    Sleep    ${CAPTCHA SLEEP TIME}
    Location Should Be    ${VALID URL LOGED IN}
    Click Button    ${CHOOSE DONOR BUTTON}
    Wait Until Page Contains    ${VALID CHOOSE DONOR MSG}
    
*** Test Cases ***
1.Open Browser And Initial Config:
    Open Browser    ${URL WELCOME}    ${BROWSER}
    Wait Until Page Contains    ${VALID WELCOME PAGE MSG}
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png
    Set Selenium Speed    ${DELAY}

2.Open Login Modal
    Click Button    ${LOGIN BUTTON}
    Wait Until Page Contains    ${VALID LOGIN MODAL MSG}
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png

3.Do Login -> Choose Donor Or Recipient
    Input Text    ${INPUT EMAIL}    ${VALID INPUT EMAIL}       
    Input Text    ${INPUT PASSWORD}    ${VALID INPUT PASSWORD}
    Click Element    ${INPUT CAPTCHA}
    Sleep    ${CAPTCHA SLEEP TIME}
    Click Button    ${GO LOGIN BUTTON}
    Sleep    ${CAPTCHA SLEEP TIME}
    Location Should Be    ${VALID URL LOGED IN}
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png

4.Test Flow [I Am Donor]
    Click Button    ${CHOOSE DONOR BUTTON}
    Sleep    ${CAPTCHA SLEEP TIME}
    Wait Until Page Contains    ${VALID CHOOSE DONOR MSG}
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png

5.Test Flow [I Am Donor]
    Do Login
    Sleep    ${CAPTCHA SLEEP TIME}
    #Click Element    ${CHOOSE DONOR BUTTON}
    Wait Until Page Contains    ${VALID CHOOSE DONOR MSG}
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png
6.Donate Success [All Input is Valid]
    Do Login
    Sleep    ${CAPTCHA SLEEP TIME}
    #Click Element    ${CHOOSE DONOR BUTTON}
    Wait Until Page Contains    ${VALID CHOOSE DONOR MSG}
    Input Text   ${INPUT NAME}    ${VALID INPUT NAME}
    Input Text    ${INPUT DETAILS}    ${VALID INPUT DETAILS}
    Input Text    ${INPUT DESCRIPTION}    ${VALID INPUT DESCRIPTION}
    Input Text    ${INPUT WIDTH}    ${VALID INPUT WIDTH}
    Input Text    ${INPUT HEIGHT}    ${VALID INPUT HEIGHT}
    Input Text    ${INPUT LENGTH}    ${VALID INPUT LENGTH}
    Input Text    ${INPUT WEIGHT}    ${VALID INPUT WEIGHT}
    Input Text    ${INPUT IMAGE}    ${VALID INPUT IMAGE}
    Input Text    ${INPUT AMOUNT}    ${VALID INPUT AMOUNT}
    Input Text    ${INPUT TYPE}    ${VALID INPUT TYPE}
    Click Button    ${DONOR SUBMIT BUTTON} 
    Sleep    ${CAPTCHA SLEEP TIME}
    Wait Until Page Contains    ${VALID DONATE MSG}
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png

7.Donate Fail [Name is Empty]
    Do Login
    Sleep    ${CAPTCHA SLEEP TIME}
    #Click Button    ${CHOOSE DONOR BUTTON}
    Wait Until Page Contains    ${VALID CHOOSE DONOR MSG}
    #Input Text   ${INPUT NAME}    ${VALID INPUT NAME}
    Input Text    ${INPUT DETAILS}    ${VALID INPUT DETAILS}
    Input Text    ${INPUT DESCRIPTION}    ${VALID INPUT DESCRIPTION}
    Input Text    ${INPUT WIDTH}    ${VALID INPUT WIDTH}
    Input Text    ${INPUT HEIGHT}    ${VALID INPUT HEIGHT}
    Input Text    ${INPUT LENGTH}    ${VALID INPUT LENGTH}
    Input Text    ${INPUT WEIGHT}    ${VALID INPUT WEIGHT}
    Input Text    ${INPUT IMAGE}    ${VALID INPUT IMAGE}
    Input Text    ${INPUT AMOUNT}    ${VALID INPUT AMOUNT}
    Input Text    ${INPUT TYPE}    ${VALID INPUT TYPE}
    Click Button    ${DONOR SUBMIT BUTTON} 
    Sleep    ${CAPTCHA SLEEP TIME}
    Wait Until Page Contains    ${INVALID DONATE EMPTY NAME MSG} 
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png
    [Teardown]    Close Browser

