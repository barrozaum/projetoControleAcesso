CREATE DATABASE CODENI_CONTROLE_ACESSO 

USE CODENI_CONTROLE_ACESSO
GO
/****** Object:  Table [dbo].[secretaria]    Script Date: 08/17/2017 15:21:11 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[secretaria](
	[id_secretaria] [int] IDENTITY(1,1) NOT NULL,
	[descricao_secretaria] [varchar](50) NULL,
	[numero_andar] [int] NULL,
	[telefone] [varchar](12) NULL,
	[ativo] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id_secretaria] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[controle_acesso]    Script Date: 08/17/2017 15:21:10 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[controle_acesso](
	[id_acesso] [int] IDENTITY(1,1) NOT NULL,
	[data_visita] [date] NULL,
	[hora_visita] [time](7) NULL,
	[nome_completo] [varchar](50) NULL,
	[tipo_doc] [char](1) NULL,
	[complemento_doc] [varchar](50) NULL,
	[andar] [int] NULL,
	[secretaria] [int] NULL,
	[assunto] [varchar](50) NULL,
	[autorizado] [char](1) NULL,
	[observacao] [text] NULL,
	[usuario] [varchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id_acesso] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[usuario]    Script Date: 08/17/2017 15:21:11 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[usuario](
	[id_usuario] [int] IDENTITY(1,1) NOT NULL,
	[usuario] [varchar](50) NULL,
	[senha] [varchar](50) NULL,
	[nome] [varchar](50) NULL,
	[ativo] [int] NULL,
	[perfil] [varchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id_usuario] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY],
UNIQUE NONCLUSTERED 
(
	[usuario] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[telefone]    Script Date: 08/17/2017 15:21:11 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[telefone](
	[id_telefone] [int] IDENTITY(1,1) NOT NULL,
	[id_acesso] [int] NOT NULL,
	[numero] [varchar](12) NULL,
 CONSTRAINT [PK_Telefone] PRIMARY KEY CLUSTERED 
(
	[id_telefone] ASC,
	[id_acesso] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Default [DF_secretaria_ativo]    Script Date: 08/17/2017 15:21:11 ******/
ALTER TABLE [dbo].[secretaria] ADD  CONSTRAINT [DF_secretaria_ativo]  DEFAULT ((0)) FOR [ativo]
GO
/****** Object:  Default [DF_usuario_ativo]    Script Date: 08/17/2017 15:21:11 ******/
ALTER TABLE [dbo].[usuario] ADD  CONSTRAINT [DF_usuario_ativo]  DEFAULT ((0)) FOR [ativo]
GO
/****** Object:  ForeignKey [FK_Telefone]    Script Date: 08/17/2017 15:21:11 ******/
ALTER TABLE [dbo].[telefone]  WITH NOCHECK ADD  CONSTRAINT [FK_Telefone] FOREIGN KEY([id_acesso])
REFERENCES [dbo].[controle_acesso] ([id_acesso])
NOT FOR REPLICATION
GO
ALTER TABLE [dbo].[telefone] NOCHECK CONSTRAINT [FK_Telefone]
GO
