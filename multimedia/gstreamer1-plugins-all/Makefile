# Created by: Michael Johnson <ahze@FreeBSD.org>
# $FreeBSD$

PORTNAME=	gstreamer1-plugins-all
PORTVERSION=	${GST1_VERSION}
PORTREVISION=	2
CATEGORIES=	multimedia

MAINTAINER=	multimedia@FreeBSD.org
COMMENT=	Meta-port of all gstreamer 1.x plugins with options

USES=		metaport

USE_GSTREAMER1=	yes

.include "${.CURDIR}/../../Mk/bsd.gstreamer.mk"

.for all in ${_GSTREAMER_PLUGINS}
OPTIONS_DEFINE+=	${all:tu}
${all:tu}_DESC=	${all} plugin
OPTIONS_DEFAULT+=	${all:tu}
.endfor

.include <bsd.port.options.mk>

# Weed out gst-plugins that can not be packaged. or are broken.
.if defined(PACKAGE_BUILDING)
PORT_OPTIONS:=	${PORT_OPTIONS:NFAAC} # Mp4 Dolby license , no package
PORT_OPTIONS:=	${PORT_OPTIONS:NLAME} # MP3 License , no package
PORT_OPTIONS:=	${PORT_OPTIONS:NVDPAU} # Needs to be build agains running kernel
.endif

OPTIONS_DEFINE_i386=	SPC

.for f in ${OPTIONS_DEFINE}
.if ${PORT_OPTIONS:M${f:tu}}
USE_GSTREAMER1+=${f:tl}
.endif
.endfor

.include <bsd.port.mk>
