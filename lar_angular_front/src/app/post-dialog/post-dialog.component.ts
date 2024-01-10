import { Component } from '@angular/core';
import { MatDialogRef } from '@angular/material/dialog';
import { Post } from '../post';

@Component({
  selector: 'app-post-dialog',
  templateUrl: './post-dialog.component.html',
  styleUrls: ['./post-dialog.component.css']
})
export class PostDialogComponent {

  public nomearquivo: string = '';

  public dados = {
    post: new Post("", "", "", "", "", ""),
    arquivo: null
  }

  constructor(
    public dialogref: MatDialogRef<PostDialogComponent>
  ){}

  public mudouarquivo(event: any) {
    this.nomearquivo = event.target.files[0].name;
    this.dados.arquivo = event.target.files[0];
  }

  salvar() {
    this.dialogref.close(this.dados);
  }

  cancelar() {
    this.dialogref.close(null);
  }

}
