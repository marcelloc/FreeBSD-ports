# $FreeBSD$

PORTNAME=	pfSense
PORTVERSION=	0.9
CATEGORIES=	devel
MASTER_SITES=	#
DISTFILES=	#
PKGNAMEPREFIX=	php56-
PKGNAMESUFFIX=	-module

MAINTAINER=	garga@pfsense.org
COMMENT=	Library for getting useful info

LIB_DEPENDS=	libvici.so:${PORTSDIR}/security/strongswan

USE_PHP=	yes
USE_PHPEXT=	yes

CFLAGS+=	-I/usr/local/include -L/usr/local/lib -L/usr/local/lib/ipsec -I. -DIPFW_FUNCTIONS

CONFIGURE_ARGS=	--enable-pfSense

extract:
	mkdir -p ${WRKSRC}
	cp -r files/* ${WRKSRC}

.include <bsd.port.mk>
