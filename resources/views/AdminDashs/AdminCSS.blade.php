<style>
    .container-fluid {
        background-color: rgb(238, 238, 238)
    }
    
    .heading {
        font-size: 40px;
        margin-top: 5px;
        margin-bottom: 30px;
        padding-left: 20px
    }
    
    .card {
        border-radius: 10px !important;
        margin-top: 50px;
        margin-bottom: 50px
    }
    
    .form-card {
        margin-left: 20px;
        margin-right: 20px
    }
    
    .form-card input,
    .form-card textarea {
        padding: 10px 15px 5px 15px;
        border: none;
        border: 1px solid lightgrey;
        border-radius: 6px;
        margin-bottom: 25px;
        margin-top: 2px;
        width: 100%;
        box-sizing: border-box;
        font-family: arial;
        color: #2C3E50;
        font-size: 14px;
        letter-spacing: 1px
    }
    
    .form-card input:focus,
    .form-card textarea:focus {
        -moz-box-shadow: 0px 0px 0px 1.5px skyblue !important;
        -webkit-box-shadow: 0px 0px 0px 1.5px skyblue !important;
        box-shadow: 0px 0px 0px 1.5px skyblue !important;
        font-weight: bold;
        border: 1px solid #304FFE;
        outline-width: 0
    }
    
    .input-group {
        position: relative;
        width: 100%;
        overflow: hidden
    }
    
    .input-group input {
        position: relative;
        height: 80px;
        margin-left: 1px;
        margin-right: 1px;
        border-radius: 6px;
        padding-top: 30px;
        padding-left: 25px
    }
    
    .input-group label {
        position: absolute;
        height: 24px;
        background: none;
        border-radius: 6px;
        line-height: 48px;
        font-size: 15px;
        color: gray;
        width: 100%;
        font-weight: 100;
        padding-left: 25px
    }
    
    input:focus+label {
        color: #304FFE
    }
    
    .btn-pay {
        background-color: #304FFE;
        height: 60px;
        color: #ffffff !important;
        font-weight: bold
    }
    
    .btn-pay:hover {
        background-color: #3F51B5
    }
    
    .radio-group {
        position: relative;
        margin-bottom: 25px
    }
    
    .radio {
        display: inline-block;
        border-radius: 6px;
        box-sizing: border-box;
        border: 2px solid lightgrey;
        cursor: pointer;
        margin: 12px 25px 12px 0px
    }
    
    .radio:hover {
        box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.2)
    }
    
    .radio.selected {
        box-shadow: 0px 0px 0px 1px rgba(0, 0, 155, 0.4);
        border: 2px solid blue
    }
    
    .label-radio {
        font-weight: bold;
        color: #000000
    }
        </style>