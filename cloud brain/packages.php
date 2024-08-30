from flask import Flask, render_template, Response, redirect, request, session, 
abort, url_for
import os
import base64
import datetime
from Crypto import Random
from Crypto.Cipher import AES
import mysql.connector