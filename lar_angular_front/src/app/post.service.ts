import { HttpClient, HttpEvent, HttpEventType, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Post } from './post';

@Injectable()
export class PostService {

  private url_base = 'http://localhost:8080';

  public posts: Post[] = [];

  constructor(
    private http: HttpClient
  ) { 
    this.http.get(`${this.url_base}/api/`).subscribe((data: any) => {
      console.log(data);
      for(let p of data) {
        this.posts.push(
          new Post(p.nome, p.titulo, p.subtitulo, p.email, p.mensagem, p.arquivo, p.id, p.likes)
        );
      }
    });
  }

  salvar(post: Post, file: File) {
    const uploadData = new FormData();
    uploadData.append('nome', post.nome);
    uploadData.append('email', post.email);
    uploadData.append('titulo', post.titulo);
    uploadData.append('subtitulo', post.subtitulo);
    uploadData.append('mensagem', post.mensagem);
    uploadData.append('nome', file, file.name);
  

    this.http.post(`${this.url_base}/api/`, uploadData, {reportProgress: true, observe: 'events'}).subscribe((data: any) => {
      
      if(data.type == HttpEventType.Response) {
        // console.log(data);
        let p: any = data.body;

        this.posts.push(
          new Post(p.nome, p.titulo, p.subtitulo, p.email, p.mensagem, p.arquivo, p.id, p.likes)
        );
      }

      if(data.type == HttpEventType.UploadProgress) {
        console.log('UploadProgress');
        console.log(data);
      }

    });

  }


  like(id: any) {
    this.http.get(`${this.url_base}/api/like/${id}`).subscribe((event: any) => {
      // console.log(event);
      let p: any = this.posts.find((p) => p.id == id);
      p.likes = event.likes;
    });
  }

  apagar(id: any) {
    this.http.delete(`${this.url_base}/api/${id}`).subscribe((event) => {
      let i = this.posts.findIndex((p) => p.id == id);

      if(i >= 0) {
        this.posts.splice(i, 1);
      }
      
    });
  }

  

}
