# Created by: Steve Wills <swills@FreeBSD.org>
# $FreeBSD$

PORTNAME=	nokogumbo
PORTVERSION=	1.4.3
CATEGORIES=	textproc rubygems
MASTER_SITES=	RG

MAINTAINER=	ruby@FreeBSD.org
COMMENT=	Nokogiri interface to the Gumbo HTML5 parser

LICENSE=	APACHE20
LICENSE_FILE=	${WRKSRC}/LICENSE.txt

RUN_DEPENDS=	rubygem-nokogiri>=0:${PORTSDIR}/textproc/rubygem-nokogiri

USE_RUBY=	yes
USE_RUBYGEMS=	yes
RUBYGEM_AUTOPLIST=	yes
USES=		pkgconfig

.include <bsd.port.mk>
