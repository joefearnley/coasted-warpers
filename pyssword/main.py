import string
import secrets
import typer
from rich import print

def main(
    length: int = typer.Option(20, prompt="Password Length?"),
    use_special_characters: str = typer.Option(
        "Y/n", prompt="Use special characters?"
    ),
):
    characters = string.ascii_letters

    if use_special_characters == 'Y' or use_special_characters == 'y':
        characters += string.punctuation

    password = ""
    for i in range(length):
        password += secrets.choice(characters)

    print("\n")
    print("[red]---- New Password Generated ----[/red]")
    print("New Password: [green]" + password + "[/green]")
    print("\n")

if __name__ == "__main__":
    typer.run(main)
