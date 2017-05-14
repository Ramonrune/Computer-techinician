package br.senai.sp.formulariocorreto;

/**
 * Created by B30 on 19/03/2015.
 */
public class Cliente {

        private Long id;
        private String nome;
        private String telefone;
        private String endereco;
        private String email;
        private String caminhoFoto;
        private Double rank;

        // o método abaixo é usado para sobrescrever o método padr]ao de classe object


        public Long getId() {
            return id;
        }

        public void setId(Long id) {
            this.id = id;
        }

        public String getNome() {
            return nome;
        }

        public void setNome(String nome) {
            this.nome = nome;
        }

        public String getTelefone() {
            return telefone;
        }

        public void setTelefone(String telefone) {
            this.telefone = telefone;
        }

        public String getEmail() {
            return email;
        }

        public void setEmail(String email) {
            this.email = email;
        }

        public String getEndereco() {
            return endereco;
        }

        public void setEndereco(String endereco) {
            this.endereco = endereco;
        }

        public String getCaminhoFoto() {
            return caminhoFoto;
        }

        public void setCaminhoFoto(String caminhoFoto) {
            this.caminhoFoto = caminhoFoto;
        }

        public Double getRank() {
            return rank;
        }

        public void setRank(Double rank) {
            this.rank = rank;
        }

        public String toString(){
            //TODO Auto-generated method stub
            return id +" - "+nome;
        }
    }

