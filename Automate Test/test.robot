*** Settings ***
Library    Selenium2Library

*** Variables ***
#CONFIG
${BROWSER}    Chrome
${DELAY}    0
${URL WELCOME}    http://10.199.66.227/SoftEn2017/group11/SoftEn/
${URL DONOR}    http://10.199.66.227/SoftEn2017/group11/SoftEn/index.php/donate/donor

#INPUT VARIABLES
${INPUT NAME}    dname
${INPUT DETAILS}    ddetail
${INPUT SIZE}    dsize
${INPUT WEIGHT}    dweight
${INPUT IMAGE}    fileUpload[]
${INPUT AMOUNT}    damount
${INPUT TYPE}    donate_type

#VALID INPUT
${VALID NAME}    ของเล่นเด็กชนิดหนึ่ง
${VALID DETAILS}    เป็นของเล่นที่ได้รับบริจาคมาจากมูลนิธิแห่งหนึาง
${VALID SIZE}    18.25
${VALID WEIGHT}    18.25s
${VALID IMAGE PATH}    D:/1.jpg
${VALID AMOUNT}    12
${VALID TYPE}    1

#INVALID INPUT
${INVALID SIZE}    18.2o
${INVALID WEIGHT}    ascs

#VALID MSG
${VALID DONATE PAGE CONTAINS}    รายละเอียดของที่บริจาค
${VALID WELCOME PAGE}    ยินดีต้อนรับ
${DONATE SUCCESS MSG}    อัพโหลดเสร็จสมบูรณ์

#INVALID MSG
${INVALID NAME MSG}    ----
${INVALID DETAILS MSG}    ----
${INVALID SIZE MSG}    ----
${INVALID WEIGHT MSG}    ---
${INVALID PHOTO MSG}    กรุณาเลือกรูปถ่าย

#BLANK INPUT MSG
${BLANK NAME MSG}    โปรดกรอกชื่อของที่จะบริจาค
${BLANK DETAILS MSG}    โปรดกรอกรายละเอียดของที่จะบริจาค
${BLANK SIZE MSG}    โปรดกรอกขนาดของที่บริจาค
${BLANK WEIGHT MSG}    โปรดกรอกน้ำหนักของที่บริจาค
${BLANK AMOUNT MSG}    โปรดกรอกน้ำหนักของที่บริจาค
${BLANK TYPE MSG}    โปรเลือกประเภทสินค้าที่จะบริจาค
${BLANK PHOTO MSG}    โปรเลือกรูปภาพสินค้าที่จะบริจาค

#BUTTON
${SUBMIT BUTTON}    submitBtn
${DONOR BUTTON}    donorBtn



*** Test Cases ***
Open Browser And Initial Config:
    Open Browser    ${URL WELCOME}    ${BROWSER}
    Wait Until Page Contains    ${VALID WELCOME PAGE}
    Set Selenium Speed    ${DELAY}

Go To Donor Page
    Click Button    ${DONOR BUTTON}
     Wait Until Page Contains    ${VALID DONATE PAGE CONTAINS}
    Location Should Be    ${URL DONOR}

Donate Success
    Go To    ${URL DONOR}
    Input Text    ${INPUT NAME}    ${VALID NAME}
    Input Text    ${INPUT DETAILS}    ${VALID DETAILS}
    Input Text    ${INPUT AMOUNT}    ${VALID AMOUNT}
    Input Text    ${INPUT SIZE}    ${VALID SIZE}
    Select From List By Value    ${INPUT TYPE}    ${VALID TYPE}
    Input Text    ${INPUT WEIGHT}    ${VALID WEIGHT}
    Choose File    ${INPUT IMAGE}    ${VALID IMAGE PATH}
    Click Button    ${SUBMIT BUTTON}
    Wait Until Page Contains    ${DONATE SUCCESS MSG}

# Donate Fail Invalid Size
#     Go To    ${URL DONOR}
#     Input Text    ${INPUT NAME}    ${VALID NAME}
#     Input Text    ${INPUT DETAILS}    ${VALID DETAILS}
#     Input Text    ${INPUT SIZE}    ${INVALID SIZE}
#     Input Text    ${INPUT WEIGHT}    ${VALID WEIGHT}
#     Choose File    ${INPUT IMAGE}    ${VALID IMAGE PATH}
#     Input Text    ${INPUT AMOUNT}    ${VALID AMOUNT}
#     Select From List By Value    ${INPUT TYPE}    ${VALID TYPE}
#     Click Button    ${SUBMIT BUTTON}
#     #Wait Until Page Contains    ${INVALID SIZE MSG}

# Donate Fail Invalid Weight
#     Go To    ${URL DONOR}
#     Input Text    ${INPUT NAME}    ${VALID NAME}
#     Input Text    ${INPUT DETAILS}    ${VALID DETAILS}
#     Input Text    ${INPUT SIZE}    ${VALID SIZE}
#     Input Text    ${INPUT WEIGHT}    ${INVALID WEIGHT}
#     Choose File    ${INPUT IMAGE}    ${VALID IMAGE PATH}
#     Input Text    ${INPUT AMOUNT}    ${VALID AMOUNT}
#     Select From List By Value    ${INPUT TYPE}    ${VALID TYPE}
#     Click Button    ${SUBMIT BUTTON}
#     #Wait Until Page Contains    ${INVALID WEIGHT MSG}

Donate Fail Name is blank
    Go To    ${URL DONOR}
    #Input Text    ${INPUT NAME}
    Input Text    ${INPUT DETAILS}    ${VALID DETAILS}
    Input Text    ${INPUT SIZE}    ${VALID SIZE}
    Input Text    ${INPUT WEIGHT}    ${INVALID WEIGHT}
    Choose File    ${INPUT IMAGE}    ${VALID IMAGE PATH}
    Input Text    ${INPUT AMOUNT}    ${VALID AMOUNT}
    Select From List By Value    ${INPUT TYPE}    ${VALID TYPE}
    Click Button    ${SUBMIT BUTTON}
    Wait Until Page Contains    ${BLANK NAME MSG}

Donate Fail Details is blank
    Go To    ${URL DONOR}
    Input Text    ${INPUT NAME}    ${VALID NAME}
    #Input Text    ${INPUT DETAILS}
    Input Text    ${INPUT SIZE}    ${VALID SIZE}
    Input Text    ${INPUT WEIGHT}    ${INVALID WEIGHT}
    Choose File    ${INPUT IMAGE}    ${VALID IMAGE PATH}
    Input Text    ${INPUT AMOUNT}    ${VALID AMOUNT}
    Select From List By Value    ${INPUT TYPE}    ${VALID TYPE}
    Click Button    ${SUBMIT BUTTON}
    Wait Until Page Contains    ${BLANK DETAILS MSG}

Donate Fail Size is blank
    Go To    ${URL DONOR}
    Input Text    ${INPUT NAME}    ${VALID NAME}
    Input Text    ${INPUT DETAILS}    ${VALID DETAILS}
    #Input Text    ${INPUT SIZE}
    Input Text    ${INPUT WEIGHT}    ${VALID WEIGHT}
    Choose File    ${INPUT IMAGE}    ${VALID IMAGE PATH}
    Input Text    ${INPUT AMOUNT}    ${VALID AMOUNT}
    Select From List By Value    ${INPUT TYPE}    ${VALID TYPE}
    Click Button    ${SUBMIT BUTTON}
    Wait Until Page Contains    ${BLANK SIZE MSG}

Donate Fail Weight is blank
    Go To    ${URL DONOR}
    Input Text    ${INPUT NAME}    ${VALID NAME}
    Input Text    ${INPUT DETAILS}    ${VALID DETAILS}
    Input Text    ${INPUT SIZE}    ${VALID SIZE}
    #Input Text    ${INPUT WEIGHT}
    Choose File    ${INPUT IMAGE}    ${VALID IMAGE PATH}
    Input Text    ${INPUT AMOUNT}    ${VALID AMOUNT}
    Select From List By Value    ${INPUT TYPE}    ${VALID TYPE}
    Click Button    ${SUBMIT BUTTON}
    Wait Until Page Contains    ${BLANK WEIGHT MSG}

Donate Fail Photo is blank
    Go To    ${URL DONOR}
    Input Text    ${INPUT NAME}    ${VALID NAME}
    Input Text    ${INPUT DETAILS}    ${VALID DETAILS}
    Input Text    ${INPUT SIZE}    ${VALID SIZE}
    Input Text    ${INPUT WEIGHT}    ${VALID WEIGHT}
    #Choose File    ${INPUT IMAGE}    ${VALID IMAGE PATH}
    Input Text    ${INPUT AMOUNT}    ${VALID AMOUNT}
    Select From List By Value    ${INPUT TYPE}    ${VALID TYPE}
    Click Button    ${SUBMIT BUTTON}
    Wait Until Page Contains    ${BLANK PHOTO MSG}

Donate Fail Amount is blank
    Go To    ${URL DONOR}
    Input Text    ${INPUT NAME}    ${VALID NAME}
    Input Text    ${INPUT DETAILS}    ${VALID DETAILS}
    Input Text    ${INPUT SIZE}    ${VALID SIZE}
    Input Text    ${INPUT WEIGHT}    ${VALID WEIGHT}
    Choose File    ${INPUT IMAGE}    ${VALID IMAGE PATH}
    #Input Text    ${INPUT AMOUNT}    ${VALID AMOUNT}
    Select From List By Value    ${INPUT TYPE}    ${VALID TYPE}
    Click Button    ${SUBMIT BUTTON}
    Wait Until Page Contains    ${BLANK AMOUNT MSG}

Donate Fail Type is blank
    Go To    ${URL DONOR}
    Input Text    ${INPUT NAME}    ${VALID NAME}
    Input Text    ${INPUT DETAILS}    ${VALID DETAILS}
    Input Text    ${INPUT SIZE}    ${VALID SIZE}
    Input Text    ${INPUT WEIGHT}    ${VALID WEIGHT}
    Choose File    ${INPUT IMAGE}    ${VALID IMAGE PATH}
    Input Text    ${INPUT AMOUNT}    ${VALID AMOUNT}
    #Select From List By Value    ${INPUT TYPE}    ${VALID TYPE}
    Click Button    ${SUBMIT BUTTON}
    Wait Until Page Contains    ${BLANK AMOUNT MSG}

Donate Fail Name and Detail is blank
    Go To    ${URL DONOR}
    #Input Text    ${INPUT NAME}    ${VALID NAME}
    #Input Text    ${INPUT DETAILS}    ${VALID DETAILS}
    Input Text    ${INPUT SIZE}    ${VALID SIZE}
    Input Text    ${INPUT WEIGHT}    ${VALID WEIGHT}
    Choose File    ${INPUT IMAGE}    ${VALID IMAGE PATH}
    Input Text    ${INPUT AMOUNT}    ${VALID AMOUNT}
    Select From List By Value    ${INPUT TYPE}    ${VALID TYPE}
    Click Button    ${SUBMIT BUTTON}
    Wait Until Page Contains    ${BLANK NAME MSG}
    Wait Until Page Contains    ${BLANK DETAILS MSG}

Donate Fail Name and Size is blank
    Go To    ${URL DONOR}
    #Input Text    ${INPUT NAME}    ${VALID NAME}
    Input Text    ${INPUT DETAILS}    ${VALID DETAILS}
    #Input Text    ${INPUT SIZE}    ${VALID SIZE}
    Input Text    ${INPUT WEIGHT}    ${VALID WEIGHT}
    Choose File    ${INPUT IMAGE}    ${VALID IMAGE PATH}
    Input Text    ${INPUT AMOUNT}    ${VALID AMOUNT}
    Select From List By Value    ${INPUT TYPE}    ${VALID TYPE}
    Click Button    ${SUBMIT BUTTON}
    Wait Until Page Contains    ${BLANK NAME MSG}
    Wait Until Page Contains    ${BLANK SIZE MSG}

Donate Fail Name and Weight is blank
    Go To    ${URL DONOR}
    #Input Text    ${INPUT NAME}    ${VALID NAME}
    Input Text    ${INPUT DETAILS}    ${VALID DETAILS}
    Input Text    ${INPUT SIZE}    ${VALID SIZE}
    #Input Text    ${INPUT WEIGHT}    ${VALID WEIGHT}
    Choose File    ${INPUT IMAGE}    ${VALID IMAGE PATH}
    Input Text    ${INPUT AMOUNT}    ${VALID AMOUNT}
    Select From List By Value    ${INPUT TYPE}    ${VALID TYPE}
    Click Button    ${SUBMIT BUTTON}
    Wait Until Page Contains    ${BLANK NAME MSG}
    Wait Until Page Contains    ${BLANK WEIGHT MSG}


# Donate Fail Name and Details is blank
#     Go To    ${URL DONOR}
#     #Input Text    ${INPUT NAME}    ${VALID NAME}
#     #Input Text    ${INPUT DETAILS}    ${VALID DETAILS}
#     Input Text    ${INPUT SIZE}    ${VALID SIZE}
#     Input Text    ${INPUT WEIGHT}    ${VALID WEIGHT}
#     Choose File    ${INPUT IMAGE}    ${VALID IMAGE PATH}
#     Click Button    ${SUBMIT BUTTON}
#     #Wait Until Page Contains    ${INVALID NAME AND DETAIL MSG}

# Donate Fail Name and Size is blank
#     Go To    ${URL DONOR}
#     #Input Text    ${INPUT NAME}    ${VALID NAME}
#     Input Text    ${INPUT DETAILS}    ${VALID DETAILS}
#     #Input Text    ${INPUT SIZE}    ${VALID SIZE}
#     Input Text    ${INPUT WEIGHT}    ${VALID WEIGHT}
#     Choose File    ${INPUT IMAGE}    ${VALID IMAGE PATH}
#     Click Button    ${SUBMIT BUTTON}
#     #Wait Until Page Contains    ${DONATE SUCCESS MSG}

# Donate Fail Name and Weight is blank
#     Go To    ${URL DONOR}
#     #Input Text    ${INPUT NAME}    ${VALID NAME}
#     Input Text    ${INPUT DETAILS}    ${VALID DETAILS}
#     Input Text    ${INPUT SIZE}    ${VALID SIZE}
#     #Input Text    ${INPUT WEIGHT}    ${VALID WEIGHT}
#     Choose File    ${INPUT IMAGE}    ${VALID IMAGE PATH}
#     Click Button    ${SUBMIT BUTTON}
#     #Wait Until Page Contains    ${DONATE SUCCESS MSG}

# Donate Fail Name and Photo is blank
#     Go To    ${URL DONOR}
#     #Input Text    ${INPUT NAME}    ${VALID NAME}
#     Input Text    ${INPUT DETAILS}    ${VALID DETAILS}
#     Input Text    ${INPUT SIZE}    ${VALID SIZE}
#     Input Text    ${INPUT WEIGHT}    ${VALID WEIGHT}
#     #Choose File    ${INPUT IMAGE}    ${VALID IMAGE PATH}
#     Click Button    ${SUBMIT BUTTON}
#     #Wait Until Page Contains    ${DONATE SUCCESS MSG}

