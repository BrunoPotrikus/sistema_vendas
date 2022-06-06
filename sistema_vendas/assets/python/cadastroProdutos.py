from genericpath import isfile
import json
import tkinter as tk
from tkinter import ttk
import tkinter.filedialog as tkf

janela = tk.Tk()

categorias = ['Revista em quadrinhos',
            'Action Figure',
            'Mangá',
            'Livros']

def insereProduto():
    idProduto = int(entry_idProduto.get())
    imagem = entry_imagem.get()
    nome = entry_nome.get()
    categoria = combobox_categoria.get()
    preco = int(entry_preco.get())
    imagemNome = imagem.split('/')
    produto = { 'id': idProduto,
                'Nome': nome,
                'Categoria': categoria, 
                'Preco': preco, 
                'Imagem': imagemNome[len(imagemNome)-1]}
    jsonDump(produto)

janela.title('Cadastro de Produtos')

label_idProduto = tk.Label(text='Id')
label_idProduto.grid(row=1, column=0, padx=10, pady=10, sticky='nswe', columnspan=2)
entry_idProduto = tk.Entry()
entry_idProduto.grid(row=1, column=2, padx=10, pady=10, sticky='nswe', columnspan=4)

label_nome = tk.Label(text='Nome do produto')
label_nome.grid(row=2, column=0, padx=10, pady=10, sticky='nswe', columnspan=2)
entry_nome = tk.Entry()
entry_nome.grid(row=2, column=2, padx=10, pady=10, sticky='nswe', columnspan=4)

label_categoria = tk.Label(text='Categoria')
label_categoria.grid(row=3, column=0, padx=10, pady=10, sticky='nswe', columnspan=2)
combobox_categoria = ttk.Combobox(values=categorias)
combobox_categoria.grid(row=3, column=2, padx=10, pady=10, sticky='nswe', columnspan=2)

label_preco = tk.Label(text='Preço')
label_preco.grid(row=4, column=0, padx=10, pady=10, sticky='nswe', columnspan=2)
entry_preco = tk.Entry()
entry_preco.grid(row=4, column=2, padx=10, pady=10, sticky='nswe', columnspan=2)

label_imagem = tk.Label(text='Imagem')
label_imagem.grid(row=5, column=0, padx=10, pady=10, sticky='nswe', columnspan=2)
entry_imagem = tk.Entry(janela, font=40)
def getImagem():
    filename = tkf.askopenfilename(filetypes=(("Image files", "*.jpg *.jpeg *.png"), ("All files", "*.*")))
    entry_imagem.insert(tk.END, filename)
button_imagem = tk.Button(janela, text="Procurar...", font=20, command=getImagem)
button_imagem.grid(row=5,column=2, padx=10, pady=10, sticky='nswe', columnspan=4)

button_cadastro = tk.Button(text='Cadastrar', font=20, command=insereProduto)
button_cadastro.grid(row=6, column=0, padx=10, pady=10, sticky='nswe', columnspan=4)

def jsonDump(produto):
    produtos = readJson()
    produtos.append(produto)
    with open('produtos.json', 'w') as fp:
        json.dump(produtos, fp)

def readJson():
    if isfile('produtos.json'):
        with open('produtos.json', 'r') as fp:
            return json.load(fp)
    else:
        arrayTemp = []
        return arrayTemp

janela.mainloop()