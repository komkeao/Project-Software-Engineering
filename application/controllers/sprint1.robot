*** Settings ***
Library    Selenium2Library


*** Variables ***

#CONFIG
${BROWSER}    Chrome
${DELAY}    1
${URL WELCOME}    http://10.199.66.227/SoftEn2017/group11/


#SUCCESS URL
${URL FORGET}    http://10.199.66.227/SoftEn2017/group11/index.php/home/forget_password
${URL LOGIN SUCCESS}    http://10.199.66.227/SoftEn2017/group11/index.php/home/donation
${URL PROFILE}    http://10.199.66.227/SoftEn2017/group11/index.php/user/profile
${URL RESET PASSWORD}    http://10.199.66.227/SoftEn2017/group11/index.php/home/reset_password
${URL LOGOUT}    http://10.199.66.227/SoftEn2017/group11/index.php/home/logout


#INPUT VARIABLES
${INPUT EMAIL}    email
${INPUT PASSWORD}    password
${INPUT ANSWER}    answer
${INPUT CONFIRM PASSWORD}    confirm_password
${INPUT FORGET QUESTION}    question
${INPUT FORGET ANSWER}    answer
${INPUT FORGET EMAIL}    emailforget
${INPUT RESET PASSWORD}    reset_password
${INPUT RESET CONFIRM PASSWORD}    confirm_reset_password


#VALID MSG
${VALID WELCOME PAGE}    News
${VALID LOGIN MODAL}    เข้าสู่ระบบ
${VALID FORGET PAGE CONTAINS}    ลืมรหัสผ่าน
${VALID RESET PASSWORD MSG}    รีเซ็ตรหัสผ่าน
${VALID PASSWORD LENGHT MSG}    รหัสผ่านมีความยาวระหว่าง 8 ถึง 16 ตัวอักษร
${VALID PASSWORD UPPERCASE MSG}    รหัสผ่านมีตัวอักษรพิมพ์ใหญ่อย่างน้อย 1 ตัว
${VALID PASSWORD LOWERCASE MSG}    รหัสผ่านมีตัวอักษรพิมพ์เล็กอย่างน้อย 1 ตัว
${VALID PASSWORD NUMBER MSG}    รหัสผ่านมีตัวเลขอย่างน้อย 1 ตัว
${VALID PASSWORD SPECIAL MSG}    รหัสผ่านมีอักขระพิเศษอย่างน้อย 1 ตัว
${VALID MACHING PASSWORD}    รหัสผ่านตรงกัน
${VALID PROFILE MSG}    ข้อมูลส่วนตัว


#INVALID MSG
${RESET PASSWORD INVALID EMAIL PATTERN MSG}    รูปแบบอีเมล์ไม่ถูกต้อง
${FORGET PASSWORD INVALID MSG}    อีเมล์ คำถาม หรือคำตอบไม่ถูกต้อง
${INVALID PASSWORD LENGHT MSG}    รหัสผ่านต้องมีความยาวระหว่าง 8 ถึง 16 ตัวอักษร
${INVALID PASSWORD UPPERCASE MSG}    รหัสผ่านต้องมีตัวอักษรพิมพ์ใหญ่อย่างน้อย 1 ตัว
${INVALID PASSWORD LOWERCASE MSG}    รหัสผ่านต้องมีตัวอักษรพิมพ์เล็กอย่างน้อย 1 ตัว
${INVALID PASSWORD NUMBER MSG}    รหัสผ่านต้องมีตัวเลขอย่างน้อย 1 ตัว
${INVALID PASSWORD SPECIAL MSG}    รหัสผ่านต้องมีอักขระพิเศษอย่างน้อย 1 ตัว
${INVALID MACHING PASSWORD}    รหัสผ่านไม่ตรงกัน
${INVALID EMPTY PASSWORD}    รหัสผ่านห้ามว่าง


#BUTTON
${LOGIN BUTTON}    loginModal
${GO LOGIN BUTTON}    submitLogin
${FORGET LINK}    http://10.199.66.227/SoftEn2017/group11/index.php/home/forget_password
${FORGET BUTTON}    submitForm
${RESET BUTTON}    submitPassword


#VALID INPUT
${VALID INPUT EMAIL}    komkeao@weshare4u.com
${VALID INPUT PASSWORD}    KKU@123kku
${VALID INPUT FORGET EMAIL}    komkeao@weshare4u.com
${VALID INPUT FORGET ANSWER}    kku
${VALID INPUT FORGET QUESTION}    6
${VALID INPUT RESET PASSWORD}    KKU@123kku
${VALID INPUT RESET CONFIRM PASSWORD}    KKU@123kku
${VALID LOGIN MSG}    สวัสดีคุณ


#INVALID INPUT
${INVALID PATTERN INPUT FORGET EMAIL}    komkeao@weshare4u.
${INVALID INPUT FORGET EMAIL}    komkeao@weshare4u.co.th
${INVALID INPUT FORGET ANSWER}    kk1
${INVALID INPUT FORGET QUESTION}    5
${INVALID INPUT RESET UPPERCASE PASSWORD}    kku@123kku
${INVALID INPUT RESET LOWERCASE PASSWORD}    KKU@123KKU
${INVALID INPUT RESET NUMBER PASSWORD}    KKU@kaskku
${INVALID INPUT RESET LENGHT PASSWORD}    k@123K
${INVALID INPUT RESET SPECIAL PASSWORD}    KKUa123kku
${INVALID INPUT RESET CONFIRM PASSWORD}    kku@123kku1


*** Keywords ***
Forget Password All Input Valid
    Go To    ${FORGET LINK}
    Input Text    ${INPUT FORGET EMAIL}    ${VALID INPUT FORGET EMAIL}
    Select From List By Value    ${INPUT FORGET QUESTION}    ${VALID INPUT FORGET QUESTION}
    Input Text    ${INPUT FORGET ANSWER}    ${VALID INPUT FORGET ANSWER}
    Click Button    ${FORGET BUTTON}
    Wait Until Page Contains    ${VALID RESET PASSWORD MSG} 
Do Login 
    Go To    ${URL WELCOME}
    Click Button    ${LOGIN BUTTON}
    Wait Until Page Contains    ${VALID LOGIN MODAL}
    Input Text    ${INPUT EMAIL}    ${VALID INPUT EMAIL}       
    Input Text    ${INPUT PASSWORD}    ${VALID INPUT PASSWORD}
    Click Element    tag=iframe
    Click Button    ${GO LOGIN BUTTON}
    Wait Until Page Contains    ${VALID LOGIN MSG}
    Go To    ${URL PROFILE}
    Wait Until Page Contains    ${VALID PROFILE MSG}
    Go To    ${URL RESET PASSWORD}
    Wait Until Page Contains    ${VALID RESET PASSWORD MSG}

    
*** Test Cases ***
Open Browser And Initial Config:
    Open Browser    ${URL WELCOME}    ${BROWSER}
    Wait Until Page Contains    ${VALID WELCOME PAGE}
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png
    Set Selenium Speed    ${DELAY}

Go To Login Modal
    Click Button    ${LOGIN BUTTON}
    Wait Until Page Contains    ${VALID LOGIN MODAL}
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png

Go To Forget Page
    Go To    ${FORGET LINK}
    Wait Until Page Contains    ${VALID FORGET PAGE CONTAINS}
    Location Should Be    ${URL FORGET}
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png
    
Forget Password All Input Valid
    Input Text    ${INPUT FORGET EMAIL}    ${VALID INPUT FORGET EMAIL}
    Select From List By Value    ${INPUT FORGET QUESTION}    ${VALID INPUT FORGET QUESTION}
    Input Text    ${INPUT FORGET ANSWER}    ${VALID INPUT FORGET ANSWER}
    Click Button    ${FORGET BUTTON}
    Wait Until Page Contains    ${VALID RESET PASSWORD MSG} 
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png 

Forget Password Email Pattern Invalid
    Go To    ${FORGET LINK}
    Input Text    ${INPUT FORGET EMAIL}    ${INVALID PATTERN INPUT FORGET EMAIL}
    Select From List By Value    ${INPUT FORGET QUESTION}    ${VALID INPUT FORGET QUESTION}
    Input Text    ${INPUT FORGET ANSWER}    ${VALID INPUT FORGET ANSWER}
    Click Button    ${FORGET BUTTON}
    Wait Until Page Contains    ${RESET PASSWORD INVALID EMAIL PATTERN MSG} 
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png 

Forget Password Email Invalid
    Go To    ${FORGET LINK}
    Input Text    ${INPUT FORGET EMAIL}    ${INVALID INPUT FORGET EMAIL}
    Select From List By Value    ${INPUT FORGET QUESTION}    ${VALID INPUT FORGET QUESTION}
    Input Text    ${INPUT FORGET ANSWER}    ${VALID INPUT FORGET ANSWER}
    Click Button    ${FORGET BUTTON}
    Wait Until Page Contains    ${FORGET PASSWORD INVALID MSG}  
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png

Forget Password Question Invalid
    Go To    ${FORGET LINK}
    Input Text    ${INPUT FORGET EMAIL}    ${VALID INPUT FORGET EMAIL}
    Select From List By Value    ${INPUT FORGET QUESTION}    ${INVALID INPUT FORGET QUESTION}
    Input Text    ${INPUT FORGET ANSWER}    ${VALID INPUT FORGET ANSWER}
    Click Button    ${FORGET BUTTON}
    Wait Until Page Contains    ${FORGET PASSWORD INVALID MSG}  
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png

Forget Password Answer Invalid
    Go To    ${FORGET LINK}
    Input Text    ${INPUT FORGET EMAIL}    ${VALID INPUT FORGET EMAIL}
    Select From List By Value    ${INPUT FORGET QUESTION}    ${VALID INPUT FORGET QUESTION}
    Input Text    ${INPUT FORGET ANSWER}    ${INVALID INPUT FORGET ANSWER}
    Click Button    ${FORGET BUTTON}
    Wait Until Page Contains    ${FORGET PASSWORD INVALID MSG}  
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png

Not Login : Reset Password All Input Valid
    Forget Password All Input Valid
    Input Text    ${INPUT RESET PASSWORD}    ${VALID INPUT RESET PASSWORD}
    Input Text    ${INPUT RESET CONFIRM PASSWORD}    ${VALID INPUT RESET CONFIRM PASSWORD}
    Focus    ${INPUT RESET PASSWORD}
    Wait Until Page Contains    ${VALID PASSWORD LENGHT MSG}
    Wait Until Page Contains    ${VALID PASSWORD UPPERCASE MSG}
    Wait Until Page Contains    ${VALID PASSWORD LOWERCASE MSG}
    Wait Until Page Contains    ${VALID PASSWORD NUMBER MSG}
    Wait Until Page Contains    ${VALID PASSWORD SPECIAL MSG}
    Wait Until Page Contains    ${VALID MACHING PASSWORD}
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png
    Click Button    ${RESET BUTTON}
    Wait Until Page Contains    ${VALID WELCOME PAGE}
    

Not Login : Reset Password not Maching
    Forget Password All Input Valid
    Input Text    ${INPUT RESET PASSWORD}    ${VALID INPUT RESET PASSWORD}
    Input Text    ${INPUT RESET CONFIRM PASSWORD}    ${INVALID INPUT RESET CONFIRM PASSWORD}
    Click Button    ${RESET BUTTON}
    Wait Until Page Contains    ${VALID PASSWORD LENGHT MSG}
    Wait Until Page Contains    ${VALID PASSWORD UPPERCASE MSG}
    Wait Until Page Contains    ${VALID PASSWORD LOWERCASE MSG}
    Wait Until Page Contains    ${VALID PASSWORD NUMBER MSG}
    Wait Until Page Contains    ${VALID PASSWORD SPECIAL MSG}
    Wait Until Page Contains    ${INVALID MACHING PASSWORD}
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png

Not Login : Reset Password Length Invalid
    Forget Password All Input Valid
    Input Text    ${INPUT RESET PASSWORD}    ${INVALID INPUT RESET LENGHT PASSWORD}
    Input Text    ${INPUT RESET CONFIRM PASSWORD}    ${INVALID INPUT RESET LENGHT PASSWORD}
    Click Button    ${RESET BUTTON}
    Wait Until Page Contains    ${INVALID PASSWORD LENGHT MSG}
    Wait Until Page Contains    ${VALID PASSWORD UPPERCASE MSG}
    Wait Until Page Contains    ${VALID PASSWORD LOWERCASE MSG}
    Wait Until Page Contains    ${VALID PASSWORD NUMBER MSG}
    Wait Until Page Contains    ${VALID PASSWORD SPECIAL MSG}
    Wait Until Page Contains    ${VALID MACHING PASSWORD}
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png

Not Login : Reset Password Uppercase Invalid
    Forget Password All Input Valid
    Input Text    ${INPUT RESET PASSWORD}    ${INVALID INPUT RESET UPPERCASE PASSWORD}
    Input Text    ${INPUT RESET CONFIRM PASSWORD}    ${INVALID INPUT RESET UPPERCASE PASSWORD}
    Click Button    ${RESET BUTTON}
    Wait Until Page Contains    ${VALID PASSWORD LENGHT MSG}
    Wait Until Page Contains    ${INVALID PASSWORD UPPERCASE MSG}
    Wait Until Page Contains    ${VALID PASSWORD LOWERCASE MSG}
    Wait Until Page Contains    ${VALID PASSWORD NUMBER MSG}
    Wait Until Page Contains    ${VALID PASSWORD SPECIAL MSG}
    Wait Until Page Contains    ${VALID MACHING PASSWORD}
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png

Not Login : Reset Password Lowercase Invalid
    Forget Password All Input Valid
    Input Text    ${INPUT RESET PASSWORD}   ${INVALID INPUT RESET LOWERCASE PASSWORD}
    Input Text    ${INPUT RESET CONFIRM PASSWORD}    ${INVALID INPUT RESET LOWERCASE PASSWORD}
    Click Button    ${RESET BUTTON}
    Wait Until Page Contains    ${VALID PASSWORD LENGHT MSG}
    Wait Until Page Contains    ${VALID PASSWORD UPPERCASE MSG}
    Wait Until Page Contains    ${INVALID PASSWORD LOWERCASE MSG}
    Wait Until Page Contains    ${VALID PASSWORD NUMBER MSG}
    Wait Until Page Contains    ${VALID PASSWORD SPECIAL MSG}
    Wait Until Page Contains    ${VALID MACHING PASSWORD}
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png

Not Login : Reset Password Number Invalid
    Forget Password All Input Valid
    Input Text    ${INPUT RESET PASSWORD}    ${INVALID INPUT RESET NUMBER PASSWORD}
    Input Text    ${INPUT RESET CONFIRM PASSWORD}    ${INVALID INPUT RESET NUMBER PASSWORD}
    Click Button    ${RESET BUTTON}
    Wait Until Page Contains    ${VALID PASSWORD LENGHT MSG}
    Wait Until Page Contains    ${VALID PASSWORD UPPERCASE MSG}
    Wait Until Page Contains    ${VALID PASSWORD LOWERCASE MSG}
    Wait Until Page Contains    ${INVALID PASSWORD NUMBER MSG}
    Wait Until Page Contains    ${VALID PASSWORD SPECIAL MSG}
    Wait Until Page Contains    ${VALID MACHING PASSWORD}
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png

Not Login : Reset Password Special Invalid
    Forget Password All Input Valid
    Input Text    ${INPUT RESET PASSWORD}    ${INVALID INPUT RESET SPECIAL PASSWORD}
    Input Text    ${INPUT RESET CONFIRM PASSWORD}    ${INVALID INPUT RESET SPECIAL PASSWORD}
    Click Button    ${RESET BUTTON}
    Wait Until Page Contains    ${VALID PASSWORD LENGHT MSG}
    Wait Until Page Contains    ${VALID PASSWORD UPPERCASE MSG}
    Wait Until Page Contains    ${VALID PASSWORD LOWERCASE MSG}
    Wait Until Page Contains    ${VALID PASSWORD NUMBER MSG}
    Wait Until Page Contains    ${INVALID PASSWORD SPECIAL MSG}
    Wait Until Page Contains    ${VALID MACHING PASSWORD}
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png

Login 
    Go To    ${URL WELCOME}
    Click Button    ${LOGIN BUTTON}
    Wait Until Page Contains    ${VALID LOGIN MODAL}
    Sleep    0.5
    Input Text    ${INPUT EMAIL}    ${VALID INPUT EMAIL}       
    Input Text    ${INPUT PASSWORD}    ${VALID INPUT PASSWORD}
    Click Element    tag=iframe
    Sleep    2
    Click Button    ${GO LOGIN BUTTON}
    Wait Until Page Contains    ${VALID LOGIN MSG}
    
Go to Profile Page
    Go To    ${URL PROFILE}
    Wait Until Page Contains    ${VALID PROFILE MSG}
    
Go To Reset Password Page
    Go To    ${URL RESET PASSWORD}
    Wait Until Page Contains    ${VALID RESET PASSWORD MSG}
    Sleep    0.5

Login : Reset Password All Input Valid
    Go To    ${URL RESET PASSWORD}
    Input Text    ${INPUT RESET PASSWORD}    ${VALID INPUT RESET PASSWORD}
    Input Text    ${INPUT RESET CONFIRM PASSWORD}    ${VALID INPUT RESET CONFIRM PASSWORD}
    Focus    ${INPUT RESET PASSWORD}
    Wait Until Page Contains    ${VALID PASSWORD LENGHT MSG}
    Wait Until Page Contains    ${VALID PASSWORD UPPERCASE MSG}
    Wait Until Page Contains    ${VALID PASSWORD LOWERCASE MSG}
    Wait Until Page Contains    ${VALID PASSWORD NUMBER MSG}
    Wait Until Page Contains    ${VALID PASSWORD SPECIAL MSG}
    Wait Until Page Contains    ${VALID MACHING PASSWORD}
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png
    Click Button    ${RESET BUTTON}
    Wait Until Page Contains    ${VALID WELCOME PAGE}
    #Click Link    ${URL LOGOUT}    

Login : Reset Password not Maching
    Go To    ${URL RESET PASSWORD}
    Input Text    ${INPUT RESET PASSWORD}    ${VALID INPUT RESET PASSWORD}
    Input Text    ${INPUT RESET CONFIRM PASSWORD}    ${INVALID INPUT RESET CONFIRM PASSWORD}
    Click Button    ${RESET BUTTON}
    Wait Until Page Contains    ${VALID PASSWORD LENGHT MSG}
    Wait Until Page Contains    ${VALID PASSWORD UPPERCASE MSG}
    Wait Until Page Contains    ${VALID PASSWORD LOWERCASE MSG}
    Wait Until Page Contains    ${VALID PASSWORD NUMBER MSG}
    Wait Until Page Contains    ${VALID PASSWORD SPECIAL MSG}
    Wait Until Page Contains    ${INVALID MACHING PASSWORD}
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png
    #Click Link    ${URL LOGOUT} 

Login : Reset Password Length Invalid
    Go To    ${URL RESET PASSWORD}
    Input Text    ${INPUT RESET PASSWORD}    ${INVALID INPUT RESET LENGHT PASSWORD}
    Input Text    ${INPUT RESET CONFIRM PASSWORD}    ${INVALID INPUT RESET LENGHT PASSWORD}
    Click Button    ${RESET BUTTON}
    Wait Until Page Contains    ${INVALID PASSWORD LENGHT MSG}
    Wait Until Page Contains    ${VALID PASSWORD UPPERCASE MSG}
    Wait Until Page Contains    ${VALID PASSWORD LOWERCASE MSG}
    Wait Until Page Contains    ${VALID PASSWORD NUMBER MSG}
    Wait Until Page Contains    ${VALID PASSWORD SPECIAL MSG}
    Wait Until Page Contains    ${VALID MACHING PASSWORD}
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png
    #Click Link    ${URL LOGOUT} 

Login : Reset Password Uppercase Invalid
    Go To    ${URL RESET PASSWORD}
    Input Text    ${INPUT RESET PASSWORD}    ${INVALID INPUT RESET UPPERCASE PASSWORD}
    Input Text    ${INPUT RESET CONFIRM PASSWORD}    ${INVALID INPUT RESET UPPERCASE PASSWORD}
    Click Button    ${RESET BUTTON}
    Wait Until Page Contains    ${VALID PASSWORD LENGHT MSG}
    Wait Until Page Contains    ${INVALID PASSWORD UPPERCASE MSG}
    Wait Until Page Contains    ${VALID PASSWORD LOWERCASE MSG}
    Wait Until Page Contains    ${VALID PASSWORD NUMBER MSG}
    Wait Until Page Contains    ${VALID PASSWORD SPECIAL MSG}
    Wait Until Page Contains    ${VALID MACHING PASSWORD}
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png
    #Click Link    ${URL LOGOUT} 

Login : Reset Password Lowercase Invalid
    Go To    ${URL RESET PASSWORD}
    Input Text    ${INPUT RESET PASSWORD}   ${INVALID INPUT RESET LOWERCASE PASSWORD}
    Input Text    ${INPUT RESET CONFIRM PASSWORD}    ${INVALID INPUT RESET LOWERCASE PASSWORD}
    Click Button    ${RESET BUTTON}
    Wait Until Page Contains    ${VALID PASSWORD LENGHT MSG}
    Wait Until Page Contains    ${VALID PASSWORD UPPERCASE MSG}
    Wait Until Page Contains    ${INVALID PASSWORD LOWERCASE MSG}
    Wait Until Page Contains    ${VALID PASSWORD NUMBER MSG}
    Wait Until Page Contains    ${VALID PASSWORD SPECIAL MSG}
    Wait Until Page Contains    ${VALID MACHING PASSWORD}
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png
    #Click Link    ${URL LOGOUT} 

Login : Reset Password Number Invalid
    Go To    ${URL RESET PASSWORD}
    Input Text    ${INPUT RESET PASSWORD}    ${INVALID INPUT RESET NUMBER PASSWORD}
    Input Text    ${INPUT RESET CONFIRM PASSWORD}    ${INVALID INPUT RESET NUMBER PASSWORD}
    Click Button    ${RESET BUTTON}
    Wait Until Page Contains    ${VALID PASSWORD LENGHT MSG}
    Wait Until Page Contains    ${VALID PASSWORD UPPERCASE MSG}
    Wait Until Page Contains    ${VALID PASSWORD LOWERCASE MSG}
    Wait Until Page Contains    ${INVALID PASSWORD NUMBER MSG}
    Wait Until Page Contains    ${VALID PASSWORD SPECIAL MSG}
    Wait Until Page Contains    ${VALID MACHING PASSWORD}
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png
    #Click Link    ${URL LOGOUT} 

Login : Reset Password Special Invalid
    Go To    ${URL RESET PASSWORD}
    Input Text    ${INPUT RESET PASSWORD}    ${INVALID INPUT RESET SPECIAL PASSWORD}
    Input Text    ${INPUT RESET CONFIRM PASSWORD}    ${INVALID INPUT RESET SPECIAL PASSWORD}
    Click Button    ${RESET BUTTON}
    Wait Until Page Contains    ${VALID PASSWORD LENGHT MSG}
    Wait Until Page Contains    ${VALID PASSWORD UPPERCASE MSG}
    Wait Until Page Contains    ${VALID PASSWORD LOWERCASE MSG}
    Wait Until Page Contains    ${VALID PASSWORD NUMBER MSG}
    Wait Until Page Contains    ${INVALID PASSWORD SPECIAL MSG}
    Wait Until Page Contains    ${VALID MACHING PASSWORD}
    Capture Page Screenshot    filename=selenium-screenshot-{index}.png
    #Click Link    ${URL LOGOUT} 