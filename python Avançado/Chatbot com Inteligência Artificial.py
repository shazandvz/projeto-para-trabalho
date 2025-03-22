import random
import re

def respond_to_user(input_text):
    responses = {
        "oi": "Olá, como posso ajudar?",
        "tchau": "Até logo!",
        "como você está?": "Estou bem, obrigado por perguntar!",
    }

    for pattern in responses:
        if re.search(pattern, input_text.lower()):
            return responses[pattern]
    return "Desculpe, não entendi."

while True:
    user_input = input("Você: ")
    if user_input.lower() == "sair":
        break
    print("Bot:", respond_to_user(user_input))
